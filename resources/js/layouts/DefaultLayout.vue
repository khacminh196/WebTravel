<template>
    <div>
        <div class="wrapper-container">
            <SideBar />
            <div class="wrapper-layout">
                <Header />
                <transition name="fade">
                    <router-view></router-view>
                </transition>
            </div>
        </div>
    </div>
</template>

<script>
import SideBar from "./SideBar.vue";
import Header from "./Header.vue";

export default {
    components: { SideBar, Header },
    name: "default",
    data() {
        return {
            openSideBar: true,
        };
    },
};
</script>

<style>

</style>
