<template>
</template>
<script>
import {Link} from '@inertiajs/inertia-vue';
export default {
    components: {Link},
    data(){
        return {
            categories: this.$page.props.categories,
        }
    },
}
</script>
