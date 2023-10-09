import { defineStore } from "pinia";
import axios from "axios";

export const useAuthStore = defineStore("authStore", {
  state: () => {
    return {
      user: localStorage.getItem("user"),
      token: localStorage.getItem("token"),
    };
  },
  getters: {
    getUser: (state) => state.user,
    getToken: (state) => state.token,
  },
  actions: {
    async register(data) {
      return await axios
        .post("http://127.0.0.1:8000/api/register", data)
        .then((res) => {
          Promise.resolve();
          return res;
        })
        .catch((err) => {
          console.log(err);
        });
    },
    async login(data) {
      return await axios
        .post("http://127.0.0.1:8000/api/login", data)
        .then((res) => {
          if (res.data.status == 404) {
            Promise.resolve();
          } else {
            localStorage.setItem("user", res.data.data);
            localStorage.setItem("token", res.data.data.token);
            Promise.resolve();
          }
          return res;
        })
        .catch((err) => {
          console.log(err);
        });
    },
    async logout() {
      return await axios
        .post("http://127.0.0.1:8000/api/logout", null, {
          headers: {
            Authorization: `Bearer ${this.token}`,
          },
        })
        .then((res) => {
          localStorage.removeItem("user");
          localStorage.removeItem("token");
          Promise.resolve();
          return res;
        })
        .catch((err) => {
          console.log(err);
          return err;
        });
    },
    async apiRequest(url ,method ,data) {
      return await axios(
        {
          method: method,
          url: "http://127.0.0.1:8000/api/" + url,
          data: data,
          headers: {
            Authorization: `Bearer ${this.token}`,
          },
        },
      )
        .then((res) => {
          Promise.resolve();
          return res;
        })
        .catch((err) => {
          console.log(err);
          return err;
        });
    },
  },
});
