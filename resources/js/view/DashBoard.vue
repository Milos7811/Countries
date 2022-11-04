<template>
    <div class="dashboard">
        <CreateCountrieButton/>
        <CountrieList/>
    </div>
</template>

<script>
import CountrieList from '../components/CountrieList';
import CreateCountrieButton from '../components/CreateCountrieButton';

export default {
    name: 'Countries',
    components: {
        CreateCountrieButton,
        CountrieList,
     },
}
</script>

<style lang="scss" scoped>
    .dashboard {
        padding: 20px;
        height: 100%;
    }

</style>
