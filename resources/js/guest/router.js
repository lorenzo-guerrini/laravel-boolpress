import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import Home from "./pages/Home";
import About from "./pages/About";
import SinglePost from "./pages/SinglePost";

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "home",
            component: Home
        },
        {
            path: "/about-us",
            name: "about",
            component: About
        },
        {
            path: "/post/:slug",
            name: "single-post",
            component: SinglePost
        },
    ]
});

export default router