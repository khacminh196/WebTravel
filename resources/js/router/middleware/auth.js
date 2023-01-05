import Cookies from "js-cookie";

export default async function auth({ to, next }) {
  const token = Cookies.get("travel_token");
  const refreshToken = Cookies.get("travel_refresh_token");
  const exceptRoutes = ["login", "forget-password", "reset-password"]

  // if (!exceptRoutes.includes(to.name) && !token && !refreshToken) {
  //   return next({ name: "login" })
  // }

  return next()
}
