<template>
   <div>
       <add-new-company/>
       <div v-if="loading">
           Данные загружаются ...
       </div>
       <div v-else>
           <div class="mt-4">
               <div class="row mb-4" v-for="row in rows " :key="'row' + row">
                   <div class="col-md-4 d-flex align-items-stretch mb-4 mb-md-0" v-for="(company, column) in companyInRow(row)"
                        :key="'row' + row + column">
                       <company-list-item :company="company"></company-list-item>
                   </div>
                   <div class="col" v-for="p in placeholdersInRow(row)" :key="'placeholder' + row + p"></div>
               </div>
           </div>
       </div>
   </div>
</template>

<script>
    import CompanyListItem from "../components/CompanyListItem";
    import addNewCompany from "./AddNewCompany";
    export default {
        name: "CompaniesIndex",
        components: {
            CompanyListItem, addNewCompany
        },
        props: ['user'],
        data() {
          return {
              companies: null,
              loading: false,
              columns: 3
          }
        },
        computed: {
            rows() {
                return this.companies === null ? 0 : Math.ceil(this.companies.length / this.columns);
            }
        },
        methods: {
            companyInRow(row) {
                return this.companies.slice((row - 1) * this.columns, row * this.columns)
            },
            placeholdersInRow(row) {
                return this.columns - this.companyInRow(row).length;
            }
        },
        mounted() {
            axios.get('/api/company')
                .then(res => {
                    this.companies = res.data.data;
                })
                .catch(error => console.log(error))
        }
    }
</script>

<style scoped>

</style>
