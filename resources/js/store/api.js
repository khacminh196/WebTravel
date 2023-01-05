const version = "/admin/v1";

export const AUTH = {
  LOGIN: version + "/login",
  LOGOUT: version + "/logout",
  REFRESH_TOKEN: version + "/refresh-jwt",
  FORGET_PASSWORD: version + "/password/admin/forget",
  RESET_PASSWORD: version + "/password/admin/reset",
  UPDATE_PROFILE: version + "/password/admin/mypage/update-profile",
  ACTIVE_BRANCH_USER: version + "/active-branch-user",
  GET_INFO: version + "/admin-info",
};