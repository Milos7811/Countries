<template>
    <div>
        <div class="select" @click="toogleShow">
            <div v-if="currentContinent" class="current-continent">
                {{ currentContinent.name }}
            </div>

            <div v-if="!currentContinent">
                All Continents
            </div>

            <div v-if="showList" class="continent-list"
                :class="[direction === 'top' ? 'direction-top' : 'direction-bottom']">
                <div v-for="(continent, index) of continents" :key="index"
                    @click="select(continent)"
                    class="continent">
                    <div>
                        {{ continent.name}}
                    </div>
                </div>
            </div>

        </div>

        <div v-if="showList" @click="showList = false" class="background"></div>

    </div>
</template>

<script>
export default {
    name: 'ContinentSelect',
    props: [ 'direction' ],
    data () {
        return {
            showList: false,
            currentContinent: undefined,
            continents: [
                {
                    code: 'AF',
                    name: 'Africa'
                },
                {
                    code: 'AN',
                    name: 'Antarctica'
                },
                {
                    code: 'AS',
                    name: 'Asia'
                },
                {
                    code: 'EU',
                    name: 'Europe'
                },
                {
                    code: 'NA',
                    name: 'North America'
                },
                {
                    code: 'OC',
                    name: 'Oceania'
                },
                {
                    code: 'SA',
                    name: 'South America'
                }
            ]
        }
    },
    methods: {
        select (continent) {
            this.currentContinent = continent

            this.$emit('input', this.currentContinent)
        },
        toogleShow () {
            this.showList = this.showList ? false : true
        }
    }
}
</script>

<style lang="scss" scoped>

    .background {
        position: fixed;
        top: 0px;
        left: 0px;
        right: 0px;
        bottom: 0px;
        cursor: pointer;
    }
    .select {
        width: 180px;
        height: 40px;
        border: 0px solid #6c757d;
        border-radius: 10px;
        font-size: 18px;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        position: relative;
        box-shadow: 0px 0px 21px 5px rgba(0,0,0,0.10);

        .direction-top {
            top: -280px !important;
        }

        .direction-bottom {
            top: 50px;
        }

        .current-continent:hover {
            color: red;
        }

        .continent-list {
            width: 180px;
            position: absolute;
            border: 0px solid ;
            border-radius: 10px;
            background-color: white;
            z-index: 10;
            padding: 10px;
            box-shadow: 0px 0px 21px 5px rgba(0,0,0,0.18);



            .continent {
                margin-top: 8px;

                &:hover {
                    color: red;
                }

                &:first-of-type {
                    margin-top: 0px;
                }
            }
        }

    }

</style>
