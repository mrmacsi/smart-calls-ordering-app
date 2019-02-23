<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        <dashboard></dashboard>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapGetters, mapMutations, mapActions} from 'vuex'
    import Dashboard from './components/Dashboard'

    export default {
        name: "App",
        components: {Dashboard},
        props: [],
        data() {
            return {};
        },
        computed: {
            ...mapGetters([]),
        },
        methods: {
            ...mapMutations([]),
            ...mapActions([]),
        },
        created() {
        }
    }
</script>

<style scoped lang="scss">

</style>