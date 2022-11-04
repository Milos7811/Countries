<template>
    <div class="wrapper">

        <Spinner v-if="!country"/>

        <div v-if="country" class="country-detail-wrapper">

            <!-- Name -->
            <div class="country-detail">
                <div class="country-attribute">
                    Name:
                </div>
                <div>
                    {{ country.name}}
                </div>
            </div>

             <!-- Code -->
             <div class="country-detail">
                <div class="country-attribute">
                    Code:
                </div>
                <div>
                    {{ country.code}}
                </div>
            </div>

             <!-- Full name -->
             <div class="country-detail">
                <div class="country-attribute">
                    Full name:
                </div>
                <div>
                    {{ country.full_name}}
                </div>
            </div>

             <!-- ISO3 -->
             <div class="country-detail">
                <div class="country-attribute">
                    ISO3:
                </div>
                <div>
                    {{ country.iso3}}
                </div>
            </div>

             <!-- Number -->
             <div class="country-detail">
                <div class="country-attribute">
                    Number:
                </div>
                <div>
                    {{ country.number}}
                </div>
            </div>

             <!-- Continent code -->
             <div class="country-detail">
                <div class="country-attribute">
                    Continent code:
                </div>
                <div>
                    {{ country.continent_code}}
                </div>
            </div>

            <!-- Order -->
            <div class="country-detail">
                <div class="country-attribute">
                    Order:
                </div>
                <div>
                    {{ country.display_order}}
                </div>
            </div>
        </div>

    </div>
</template>

<script>
import Spinner from '../components/Spinner'

export default {
    name: 'CountryDetail',
    components: { Spinner },
    data () {
        return {
            country: undefined
        }
    },
    methods: {
        getCountry () {
            axios.
                get(`/api/countries/${this.$route.params.id}`)
                .then((response) => {
                    this.country = response.data
                })
        }
    },
    mounted () {
        this.getCountry()
    }
}
</script>

<style lang="scss" scoped>
    .wrapper {
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 20px;

        .country-detail-wrapper {
            display: flex;
            flex-direction: column;
        }


        .country-detail {
            display: flex;
            flex-direction: row;
            margin-bottom: 10px;

            .country-attribute {
                margin-right: 10px;
            }
        }
    }
</style>
