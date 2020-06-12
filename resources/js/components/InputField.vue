<template>
    <div class="col-md-6">
        <input type="text"
               @input="updateField()"
               :class="hasError ? 'border-danger border' : ''"
               class="form__input"
               v-model="value"
               :id="name"
               :name="name"
               :placeholder="placeholder">

        <label class="form__label" :for="name">{{label}}</label>
        <small v-if="errors" v-text="errorMessage()" class="form-text text-danger"></small>
    </div>
</template>

<script>
    export default {
        name: "InputField",
        props: {
            name: String,
            label: String,
            placeholder: String,
            errors: Object
        },
        data: function () {
            return {
                value: '',
            }
        },
        computed: {
            hasError: function () {
                return this.errors && this.errors[0] && this.errors[0].length > 0
            }
        },
        methods: {
            updateField: function () {
                this.clearErrors();
                this.$emit('update:field', this.value)
            },
            clearErrors() {
                if (this.hasError) {
                    this.errors = undefined;
                }
            },
            errorMessage: function () {
                if (this.hasError) {
                    return this.errors[this.name][0];
                }
            },
        },
        watch: {
            data: function (val) {
                this.value = val;
            }
        }
    }
</script>

