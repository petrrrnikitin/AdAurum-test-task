<template>
        <div v-if="loading">
            <div v-for="(field,key) in company.data" class="col-12 mb-4">
                <company-field :user="user" :type="key" :field="field" :comments="comments"></company-field>
            </div>
        </div>
</template>

<script>
    import CompanyField from "../components/CompanyField";
    export default {
        name: "CompaniesShow",
        components: {CompanyField},
        props: ['user'],
        data() {
          return {
              company: {},
              comments: {},
              loading: false
          }
        },
        mounted() {
            axios.get(`/api/company/${this.$route.params.id}`)
                .then(res => {
                    this.company = res.data;
                })
                .catch(error => console.log(error))
            axios.get(`/api/comments?company_id=${this.$route.params.id}`)
                .then(res => {
                    this.comments = res.data.data;
                    this.loading = true
                })
                .catch(error => console.log(error))
        }
    }
</script>

<style scoped>

</style>
