<template>
    <v-content>
        <v-container fluid>
            <v-fade-transition mode="out-in">
                <router-view></router-view>
            </v-fade-transition>
        </v-container>
    </v-content>
</template>

<script>
    export default {
        name: "Contents",
    }
</script>

<style scoped lang="scss">

</style>