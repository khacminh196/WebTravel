<template>
    <div :class="{ sidebar: true, open: openSideBar }">
        <div class="logo-details">
            <i class="bx bxl-c-plus-plus icon"></i>
            <div class="logo_name">CodingLab</div>
            <i class="bx bx-menu" id="btn" @click="handleSideBar()"></i>
        </div>
        <ul class="nav-list">
            <li>
                <i class="bx bx-search" @click="handleSideBar()" ></i>
                <input type="text" placeholder="Search..."/>
                <span class="tooltip">Search</span>
            </li>
            <li>
                <router-link :to="{ name: 'blog'}">
                    <i class="bx bx-grid-alt"></i>
                    <span class="links_name">Blog</span>
                </router-link>
                <span class="tooltip">Blog</span>
            </li>
            <li>
                <router-link :to="{ name: 'tour'}">
                    <i class="bx bx-chat"></i>
                    <span class="links_name">Tour</span>
                </router-link>
                <span class="tooltip">Tour</span>
            </li>
            <li>
                <a href="#">
                    <i class="bx bx-pie-chart-alt-2"></i>
                    <span class="links_name">Analytics</span>
                </a>
                <span class="tooltip">Analytics</span>
            </li>
            <li>
                <a href="#">
                    <i class="bx bx-folder"></i>
                    <span class="links_name">File Manager</span>
                </a>
                <span class="tooltip">Files</span>
            </li>
            <li>
                <a href="#">
                    <i class="bx bx-cart-alt"></i>
                    <span class="links_name">Order</span>
                </a>
                <span class="tooltip">Order</span>
            </li>
            <li>
                <a href="#">
                    <i class="bx bx-heart"></i>
                    <span class="links_name">Saved</span>
                </a>
                <span class="tooltip">Saved</span>
            </li>
            <li>
                <a href="#">
                    <i class="bx bx-cog"></i>
                    <span class="links_name">Setting</span>
                </a>
                <span class="tooltip">Setting</span>
            </li>
            <li class="profile">
                <div class="profile-details">
                    <!--<img src="profile.jpg" alt="profileImg">-->
                    <div class="name_job">
                        <div class="name">Prem Shahi</div>
                        <div class="job">Web designer</div>
                    </div>
                </div>
                <i class="bx bx-log-out" id="log_out"></i>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    name: "SideBar",
    data() {
        return {
            openSideBar: true,
        };
    },
    created() {
        console.log(432423);
    },
    methods: {
        handleSideBar() {
            this.openSideBar = !this.openSideBar;
        },
    },
};
</script>

<style></style>
