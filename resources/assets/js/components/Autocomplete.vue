<template>
    <div style="position:relative" v-bind:class="{'open':openSuggestion}">
        <input class="form-control" type="text" :value="value" @input="updateValue($event.target.value)" placeholder="ปัญหาที่พบ/กิจกรรม"
               @keydown.enter = 'enter'
               @keydown.down = 'down'
               @keydown.up = 'up'
        >
        <ul class="dropdown-menu" style="width:100%">
            <li v-for="(activitys, index) in matches"
                v-bind:class="{'active': isActive(index)}"
                @click="suggestionClick(index)"
            >
                <a href="#">{{ activitys.problemsDetail }}
                </a>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {

        props: {

            value: {
                type: String,
                required: false
            },

            activitys: {
                type: Array,
                default: function () {
                    return []
                }
            }

        },
        data () {
            return {
                open: false,
                current: 0
            }
        },
        computed: {
            // Filtering the suggestion based on the input
            matches () {
                return this.activitys.filter((obj) => {
                    return obj.problemsDetail.indexOf(this.value) >= 0
                })
            },
            openSuggestion () {
                return this.selection !== '' &&
                    this.matches.length !== 0 &&
                    this.open === true
            }

        },
        methods: {

            // Triggered the input event to cascade the updates to
            // parent component
            updateValue (value) {
                if (this.open === false) {
                    this.open = true
                    this.current = 0
                }
                this.$emit('input', value)
            },

            // When enter key pressed on the input
            enter () {
                this.$emit('input', this.matches[this.current].problemsDetail);
                this.open = false
            },

            // When up arrow pressed while suggestions are open
            up () {
                if (this.current > 0) {
                    this.current--
                }
            },

            // When down arrow pressed while suggestions are open
            down () {
                if (this.current < this.matches.length - 1) {
                    this.current++
                }
            },

            // For highlighting element
            isActive (index) {
                return index === this.current
            },

            // When one of the suggestion is clicked
            suggestionClick (index) {
                this.open = false
            }

        }

        // data section here
    }
</script>