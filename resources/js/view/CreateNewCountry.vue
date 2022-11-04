<template>
    <div class="wrapper">
        <form>
            <div class="holder-first">
                <div class="holder-second">

                    <!-- Name -->
                    <div class="label-wrapper">
                        <label class="label">Name</label>
                        <div class="input-wrapper">
                            <input v-model="form.name"
                                type="text"/>
                            </div>
                    </div>
                    <div class="error-wrapper">
                        <span v-if="errors.name" class="error"> {{errors.name[0]}} </span>
                    </div>

                    <!-- Code -->
                    <div class="label-wrapper">
                        <label class="label">Code</label>
                        <div class="input-wrapper">
                            <input v-model="form.code"
                                @keyup="form.code = form.code.toUpperCase()"
                                type="text"
                                maxlength="2"/>
                        </div>
                    </div>
                    <div class="error-wrapper">
                        <span v-if="errors.code" class="error"> {{errors.code[0]}} </span>
                    </div>

                    <!-- Full name -->
                    <div class="label-wrapper">
                        <label class="label">Full name</label>
                        <div class="input-wrapper">
                            <input v-model="form.full_name"
                                type="text"/>
                        </div>
                    </div>
                    <div class="error-wrapper">
                        <span v-if="errors.full_name" class="error"> {{errors.full_name[0]}} </span>
                    </div>

                    <!-- ISO3 -->
                    <div class="label-wrapper">
                        <label class="label">ISO3</label>
                        <div class="input-wrapper">
                            <input v-model="form.iso3"
                                @keyup="form.iso3 = form.iso3.toUpperCase()"
                                type="text"
                                maxlength="3"/>
                        </div>
                    </div>
                    <div class="error-wrapper">
                        <span v-if="errors.iso3" class="error"> {{errors.iso3[0]}} </span>
                    </div>

                    <!-- Number -->
                    <div class="label-wrapper">
                        <label class="label">Number</label>
                        <div class="input-wrapper">
                            <input v-model="form.number"
                                type="number"
                                maxlength="10"/>
                        </div>
                    </div>
                    <div class="error-wrapper">
                        <span v-if="errors.number" class="error"> {{errors.number[0]}} </span>
                    </div>

                    <!-- Continent code -->
                     <div class="label-wrapper">
                        <label class="label">Continent code</label>
                        <div class="continent-select">
                            <ContinentSelect @input="setContinent"  direction="top"/>
                        </div>
                    </div>
                    <div class="error-wrapper">
                        <span v-if="errors.continent_code" class="error"> {{errors.continent_code[0]}} </span>
                    </div>

                </div>

                <div class="button-wrapper">
                    <div class="button" @click="create">Create</div>
                </div>

            </div>
        </form>
    </div>
</template>

<script>
import ContinentSelect from '../components/ContinentSelect'

export default {
    name: 'CreateNewCountry',
    components: { ContinentSelect },
    data () {
        return {
            errors: [],
            form: {
                code: '',
                name: '',
                full_name: '',
                iso3: '',
                number: '',
                continent_code: '',
            }
        }
    },
    methods: {
        setContinent (continent) {
            this.form.continent_code = continent.code
        },
        create () {
            axios.
                post('/api/countries', this.form)
                .then(() => {
                    this.$router.push({name: 'Dashboard'})
                })
                .catch((error) => {
                    this.errors = error.response.data.errors
                })
        }
    }
}
</script>

<style lang="scss" scoped>

    .wrapper {
        height: 100%;
        font-size: 18px;

        form {
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-content: flex-end;
            margin: auto;

            .holder-first {
                margin: auto;

                .holder-second {
                    display: flex;
                    flex-direction: column;
                    align-items: flex-end;
                }
            }
        }

    }

    .error-wrapper {
        width: 100%;
        height: 20px;
        display: flex;
        justify-content:center;
        margin: 10px;

        .error {
            opacity: 0.7;
            color: red;
        }
    }

    .button-wrapper {
        display: flex;
        justify-content: center;
        margin-top: 20px;
        .button {
            width: 150px;
            height: 50px;
            background-color: #28a745;
            font-size: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 0px solid;
            border-radius: 20px;
            cursor: pointer;
            transition: all 0.3s;

                &:hover {
                    box-shadow: 0 7px 25px 1px #28a745;
                }
        }
    }
    .label-wrapper {
        display: flex;
        flex-direction: row;
        justify-content: center;
        width: auto;
        // margin: 15px;

        .label {
            margin-bottom: 0px;
            margin-right: 10px;
            display: flex;
            align-items: center;
            white-space: nowrap;
        }

        .continent-select {
            min-width: 250px;
            display: flex;
            justify-content: center;
        }

        .input-wrapper {
            min-width: 250px;
            padding: 10px;
            border: 1px solid #6c757d;
            border-radius: 15px;
            display: flex;
            align-content: center;

                &:focus-within {
                    border: 1px solid red;
                }

            input {
                outline: none;
                border: none;
                width: 100%;
            }
        }
    }

</style>
