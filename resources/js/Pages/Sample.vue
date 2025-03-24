<template>
    <table>
        <thead>
        <tr>
            <th>
                AGENTFLAG
            </th>
            <th>
                CONTROLPOLICY
            </th>
            <th>
                DL_ACTIVENID
            </th>
        </tr>
        </thead>

        <tbody>
        <tr v-for="(item, index) in items.data" :key="index">
            <td>{{item.AGENTFLAG}}</td>
            <td>{{item.CONTROLPOLICY}}</td>
            <td>{{item.DL_ACTIVENID}}</td>
        </tr>
        </tbody>

    </table>
</template>
<style>
th {
    padding:10px; background-color:#eee;
}
tr {
    border-bottom:1px solid #e1e1e1;
}
td {
    padding:10px;
}
</style>
<script>
export default {
    components: {},

    data() {
        return {
            items:{
                data: []
            },
            form: this.$inertia.form({

            }),
        }
    },

    methods: {
        filter(){
            axios.get("/api/nodes", {
                params: {
                    page: 1,
                    pageSize:30,
                    view:"node",
                    nid:"All",
                    apiKey:"f9c61147-737e-4b8d-8210-0fc7b2c19751"
                }
            }).then(response => {
                this.items.data = response.data.data.result;
                console.log(this.items.data);
            })
        },
        // ?page=1&pageSize=30&view=node&nid=All&apiKey={}
    },

    mounted() {
        this.filter();
    }
}
</script>
