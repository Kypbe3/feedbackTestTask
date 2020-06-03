<template>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="alert alert-danger" role="alert" v-for="error in errors">
                    {{error}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h1 class="text-center">Форма обратной связи</h1>
                <div class="container p-0" v-if="!result">
                    <div class="row">
                        <div class="col">
                            <label for="">Ваше имя</label>
                            <input type="text" class="form-control" v-model="name">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <label for="">Телефон</label>
                            <input type="text" class="form-control" v-model="telNumber">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <label for="">Обращение</label>
                            <textarea class="form-control" v-model="message"></textarea>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <button class="btn btn-primary" @click="send()">Отправить</button>
                        </div>
                    </div>
                </div>
                <div class="container p-0" v-if="result">
                    <div class="row">
                        <div class="col text-center">
                            Спасибо за обращение.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "FeedbackComponent",
        data () {
            return {
                name: '',
                telNumber: '',
                message: '',
                errors: [],
                result: false
            }
        },
        methods: {
            async send() {
                let form = new FormData();
                form.append('name', this.name);
                form.append('telNumber', this.telNumber);
                form.append('message', this.message);
                await axios.post('/store', form).then(response => {
                    let responseData = response.data;
                    if('error' in responseData) {
                        this.errors = [];
                        responseData['error'].forEach(element => this.errors.push(element));
                    }
                    else {
                        this.result = true;
                    }
                });
            }
        }
    }
</script>

<style scoped>

</style>