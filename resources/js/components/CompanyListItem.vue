<template>
    <div class="card w-100">
        <div class="card-body">
            <router-link :to="company.links.self">
                <h5 class="card-title"> {{ company.data.title.value }} </h5>
            </router-link>
            <p class="card-text"> {{ company.data.description.value }}</p>
        </div>
    </div>
</template>

<script>
    export default {
        name: "CompanyListItem",
        props: {company:Object},

    }
</script>

<style scoped>

</style>
