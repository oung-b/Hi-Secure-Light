<template>
</template>
<script>
import {Link} from '@inertiajs/inertia-vue';
export default {
    components: {Link},
    data(){
        return {

        }
    },
    methods: {
        isInclude(path){
            return location.pathname.includes(path);
        },

        isSame(path){
            return location.href.replace(location.origin, "") === path;
        },

        gnbClass(path){
            return location.pathname.includes(path) ? 'active' : '';
        },

    },
    mounted() {
        $(".menu_btn").click(function () {
            $(".header").toggleClass("sub_nav_open");
            if ($(".header").hasClass("sub_nav_open")) {
                $("html").addClass("noScroll");
            }else{
                $("html").removeClass("noScroll");
            }
        })

        var bigNavItems = document.querySelectorAll(".big_nav li"); // big_nav의 li 요소들 선택

        bigNavItems.forEach(function(item, index) {
            item.addEventListener("click", function() {
                // 모든 big_nav의 li 요소에서 now 클래스 제거
                bigNavItems.forEach(function(bigNavItem) {
                    bigNavItem.classList.remove("now");
                });

                // 클릭된 li에 now 클래스 추가
                item.classList.add("now");

                // 모든 small_nav_wrap의 ul 요소에서 now 클래스 제거
                var smallNavItems = document.querySelectorAll(".small_nav_wrap ul");
                smallNavItems.forEach(function(smallNavItem) {
                    smallNavItem.classList.remove("now");
                });

                // 클릭된 li에 해당하는 small_nav_wrap의 ul에 now 클래스 추가
                var smallNavItem = document.querySelector(".small_nav_wrap ul:nth-child(" + (index + 1) + ")");
                smallNavItem.classList.add("now");
            });
        });
    }
}
</script>
