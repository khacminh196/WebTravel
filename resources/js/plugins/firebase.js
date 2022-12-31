import { initializeApp } from "firebase/app";
import { getFirestore } from "firebase/firestore";
import { getAuth, setPersistence } from "firebase/auth";
import { createUserWithEmailAndPassword, signInWithEmailAndPassword, browserLocalPersistence } from "firebase/auth";
// import {initializeFirestore} from 'firebase/firestore';

const firebaseConfig = {
  apiKey: process.env.VUE_APP_FIREBASE_API_KEY,
  authDomain: process.env.VUE_APP_FIREBASE_AUTH_DOMAIN,
  projectId: process.env.VUE_APP_FIREBASE_PROJECT_ID,
  storageBucket: process.env.VUE_APP_FIREBASE_STORAGE_BUCKET,
  messagingSenderId: process.env.VUE_APP_FIREBASE_MESSAGING_SENDER_ID,
  appId: process.env.VUE_APP_FIREBASE_APP_ID,
  measurementId: process.env.VUE_APP_FIREBASE_MEASUREMENT_ID
};

export const firebase = initializeApp(firebaseConfig);
// export const auth = getAuth(firebase);
// const db = initializeFirestore(firebase, {
//   experimentalForceLongPolling: true,
// });
export const db = getFirestore();
export const auth = getAuth();

export function signUpFirebase(email, password) {
  createUserWithEmailAndPassword(auth, email, password);
}

export async function loginFirebase(email, password) {
  return new Promise((resolve, reject) => {
    setPersistence(auth, browserLocalPersistence).then(() => {
      signInWithEmailAndPassword(auth, email, password)
        .then((response) => {
          resolve(response);
        })
        .catch((error) => {
          if (error.code === 'auth/user-not-found') {
            signUpFirebase(email, password);
          }
          reject(error);
        });
    });
  });
}

export function logoutFirebase() {
  auth.signOut();
}