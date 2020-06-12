import Vue from 'vue'
import VueRouter from "vue-router";
import CompanyShow from "./views/CompanyShow";
import CompaniesIndex from "./views/CompaniesIndex";


Vue.use(VueRouter);
export default new VueRouter({
    routes: [
        {path: '/', component: CompaniesIndex, name: 'companies'},
        {path: '/company/:id', component: CompanyShow, name: 'company'},
    ],
    mode: 'history'


})
