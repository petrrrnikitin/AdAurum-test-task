<template>
    <div>
        <button @click="show = !show" class="btn btn-primary">
            Добавить компанию
        </button>
        <form class="form-row form-signin mt-4" @submit.prevent="submitForm" v-if="show">
            <InputField name="title" @update:field="fields.title = $event" :errors="errors" label="Название компании"
                        placeholder="Название компании"/>
            <InputField name="tax_id_number" @update:field="fields.tax_id_number = $event" :errors="errors" label="ИНН компании"
                        placeholder="ИНН компании"/>
            <InputField name="description" @update:field="fields.description = $event" :errors="errors" label="Общая информация о компании"
                        placeholder="Общая информация о компании"/>
            <InputField name="owner" @update:field="fields.owner = $event" :errors="errors" label="Генеральный директор компании"
                        placeholder="Генеральный директор компании"/>
            <InputField name="address" @update:field="fields.address = $event" :errors="errors" label="Адрес компании"
                        placeholder="Адрес компании"/>
            <InputField name="phone" @update:field="fields.phone = $event" :errors="errors" label="Телефон компании"
                        placeholder="Телефон компании"/>
            <button type="submit" class="btn btn-success">Добавить</button>
        </form>
    </div>
</template>

<script>
    import InputField from "../components/InputField";

    export default {
        name: "addNewCompany",
        components: {InputField},
        data() {
            return {
                show: false,
                fields: {
                    'title' : '',
                    'tax_id_number' : '',
                    'description' : '',
                    'owner' : '',
                    'address' : '',
                    'phone' : '',
                },
                errors: null
            }
        },
        methods: {
            submitForm: function () {
                axios.post('/api/company', this.fields)
                    .then(response => {
                        this.$router.push(response.data.links.self);
                    })
                    .catch(errors => {
                        this.errors = errors.response.data.errors;
                    });
            }
        }
    }
</script>

<style scoped>
</style>
