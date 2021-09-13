import Home from "./views/Home.vue";
import Login from "./views/Login.vue";
import BlogDetail from "./views/BlogDetail.vue";
import PostManagement from "./views/PostManagement.vue";

export default [
    {
        path: "/",
        component: Home,
    },
    {
        path: "/login",
        component: Login,
    },
    {
        path: "/blog-detail",
        component: BlogDetail,
    },
    {
        path: "/post-management",
        component: PostManagement,
    },
];
