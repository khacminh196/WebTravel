export default [
  {
    path: "/not-found",
    component: () => import("../views/Error/404.vue"),
    name: "404",
  },
  {
    path: "/login",
    component: () => import("../views/Auth/Login.vue"),
    name: "login",
  },
  {
    path: "/home",
    name: "home",
    component: () => import("../layouts/DefaultLayout.vue"),
    children: [
      {
        path: "blog",
        component: () => import("../components/BlogComponent.vue"),
        name: "blog"
      },
      {
        path: "tour",
        component: () => import("../components/TourComponent.vue"),
        name: "tour",
      },
    ]
  }
];
