<template>
    <v-layout row justify-center>
        <v-btn small :class="[action.margin ? action.margin : action.margin, 'asd']" :color="action.color" dark @dblclick.stop="dialog = true" @click.stop="showStep(action.id)">{{ action.title }}
        </v-btn>
        <v-dialog v-model="dialog" max-width="600px">
            <v-card>
                <v-card-title>
                    <span class="headline">Set {{action.title}}</span>
                </v-card-title>
                <v-card-text>
                    <v-container grid-list-md>
                        <v-layout wrap>
                            <v-flex xs12>
                                <v-text-field v-model="btnText" :value="action.title" label="Title"></v-text-field>
                            </v-flex>
                            <v-flex xs12 sm12 md12>
                                <v-textarea
                                        name="input-7-1"
                                        label="Set Message"
                                        :value="action.text"
                                ></v-textarea>
                            </v-flex>
                            <v-flex xs12 v-if="action.type === 'question'">
                                <div v-for="(option, i) in action.extra">
                                    <v-text-field :value="option" :label="option" required></v-text-field>
                                </div>
                            </v-flex>
                        </v-layout>
                    </v-container>
                </v-card-text>
                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn color="blue darken-1" flat @click="save">Save</v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
    </v-layout>
</template>

<script>
    export default {
        name: "Action",
        components: {},
        props: ['action'],
        data() {
            return {
                dialog: false,
                btnText: this.action.title,
            }
        },
        methods: {
            save() {
                this.dialog = false
            },
            showStep(id) {
                if (this.action.stepId === '2') {
                    this.$store.commit('closeSteps')
                    this.$store.commit('showStepDrinks', {field: 'step'+ (parseInt(id)+1) + 'Drinks', state: true});
                } else {
                    this.$store.commit('closeStepsDrinks')
                    this.$store.commit('showStep', {field: 'step'+ (parseInt(id)+1), state: true});
                }
            }
        },
    }
</script>

<style scoped lang="scss">

</style>