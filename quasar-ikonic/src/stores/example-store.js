import { defineStore } from "pinia";
import { Cookies } from "quasar";
import axios from "axios";
import { Notify } from "quasar";

export const useAuthStore = defineStore("authStore", {
  state: () => ({
    user: Cookies.get("user"),
    token: Cookies.get("token"),
    isLogged: Cookies.get("isLogged"),
  }),
  getters: {
    getUser: (state) => state.user,
    getIsLogged: (state) => state.isLogged,
  },
  actions: {
    async register(data) {
      await axios
        .post(process.env.VUE_APP_API_URL+"api/register", data)
        .then((res) => {
          this.notify(res.data.message, "positive");
          Promise.resolve();
          window.location.href = '/login'
          return res;
        })
        .catch((err) => {
          this.notify(err.message, "negative");
        });
    },
    async login(data) {
      await axios
        .post(process.env.VUE_APP_API_URL+"api/login", data)
        .then((res) => {
          Cookies.set("token", res.data.data.token);
          Cookies.set("user", res.data.data);
          this.isLogged = true;
          this.notify(res.data.message, "positive");
          window.location.href = '/dashboard'
        })
        .catch((err) => {
          console.log(err);
        });
    },
    notify(message, color)
    {
       Notify.create({
         message: message,
         position: "top-right",
         color: color,
       });
    }
  },
});
