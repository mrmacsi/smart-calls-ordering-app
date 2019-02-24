<template>
    <v-overflow-btn
            :items="dropdown_font"
            label="Add +"
            flat
            @change="setAction"
            v-model="selectAction"
    ></v-overflow-btn>
</template>

<script>
    export default {
        name: "AddButton",
        components: {},
        props: [],
        data() {
            return {
                selectAction: null,
                color: '',
                dropdown_font: ['talk', 'question', 'input', 'payment']
            };
        },
        methods: {
            setColor() {
                switch(this.selectAction) {
                    case 'talk':
                        this.color = 'success';
                        break;
                    case 'question':
                        this.color = 'error';
                        break;
                    case 'input':
                        this.color = 'primary';
                        break;
                    case 'payment':
                        this.color = 'normal';
                        break;
                    default:
                        this.color = 'normal';
                }
            },
            setAction() {
                this.setColor();
                const data = {value: this.selectAction, color: this.color};
                this.$emit('add', data);
            }

        }
    }
</script>

<style scoped lang="scss">

</style>