<template>
    <div class="wrapper">

        <div v-if="countries">
            <div class="continent-select">
                <ContinentSelect v-model="continent" direction="bottom"/>
            </div>

            <div class="table-wrapper">
                <table>
                    <tr>
                        <th class="name-attribute">
                            Name
                            <RowIcon @click.native="changeDirection"
                                class="row-icon"
                                :class="{'row-rotated' : direction === 'asc'}"/>
                        </th>
                        <th>Code</th>
                        <th>Full name</th>
                        <th>ISO3</th>
                        <th>Number</th>
                        <th>Continent code</th>
                        <th>Order</th>
                    </tr>

                    <tr v-for="country of countries" :key="country.country_id">
                        <th @click="detail(country.country_id)"
                            class="name">
                        {{country.name}}</th>
                        <th>{{country.code}}</th>
                        <th>{{country.full_name}}</th>
                        <th>{{country.iso3}}</th>
                        <th>{{country.number}}</th>
                        <th>{{country.continent_code}}</th>
                        <th>{{country.display_order}}</th>
                    </tr>
                </table>
            </div>
        </div>

        <div class="paginator-wrapper">
            <Pagination v-if="paginator.records"
                v-model="paginator.page"
                :records="paginator.records"
                :per-page="10"
                :totalChunks="false"
                @paginate="myCallback"/>
        </div>

        <Spinner v-if="!countries"/>
    </div>
</template>

<script>
import Pagination from 'vue-pagination-2';
import ContinentSelect from './ContinentSelect';
import RowIcon from './Icons/RowIcon';
import Spinner from './Spinner'


export default {
    name: 'CountrieList',
    components: {
        ContinentSelect,
        Pagination,
        Spinner,
        RowIcon
    },
    data () {
        return {
            countries: undefined,
            direction: 'asc',
            continent: undefined,
            paginator: {
                page: 1,
                lastPage: undefined,
                records: undefined
            }
        }
    },
    watch: {
        continent () {
            this.paginator.page = 1

            this.getCountries()
        }
    },
    methods: {
        myCallback () {
            this.getCountries()
        },
        changeDirection () {
            this.direction = this.direction === 'asc' ? 'desc' : 'asc'

            this.getCountries()
        },
        detail (countryId) {
            this.$router.push({name: 'CountryDetail', params: {id:countryId}})
        },
        getCountries () {

            let continent = this.continent ? `/${this.continent.code}` : ''

            axios.
                get(`/api/continent${continent}?direction=${this.direction}&page=${this.paginator.page}`)
                .then((response) => {
                    this.countries = response.data.data

                    this.paginator.page = response.data.current_page
                    this.paginator.lastPage = response.data.last_page
                    this.paginator.records = response.data.total
                })
        }
    },
    mounted () {
        this.continent = undefined

        this.getCountries()
    }

}
</script>

<style lang="scss" scoped>
    .wrapper {
        display: flex;
        justify-content: center;
        flex-direction: column;
        align-items: center;
        padding: 10px;
        text-align: center;

        .continent-select {
            max-width: 700px;
        }

        .paginator-wrapper {
            position: absolute;
            left: 0px;
            bottom: 20px;
            width: 100%;
            margin-top: 30px;
            display: flex;
            justify-content: center;

            &::v-deep p {
                display: none;
            }
        }

        .table-wrapper {
            display: flex;
            justify-content: center;

            table * {
                padding: 20px;
            }

            .name-attribute {
                position: relative;
                .row-icon {
                    position: absolute;
                    right: 20px;
                    top: 24px;
                    cursor: pointer;

                }
                .row-rotated {
                    transform: rotate(180deg) !important;
                }
            }
        }

    }

    .name {
        cursor: pointer;

        &:hover {
            color: red;
        }
    }

    tr:first-child{
        border-bottom: 1px solid #6c757d;
    }

</style>
