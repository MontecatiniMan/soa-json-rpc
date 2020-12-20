<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <label for="date">Please enter date</label>
                        <input type="text" id="date" v-model="date" placeholder="Y-m-d"/>
                        <input type="submit" value="Request" @click="request" :disabled="pending ? 'disabled' : null">
                    </div>
                </div>
                <div v-if="response !== null" class="alert alert-info" style="padding: 20px; max-width: 500px; max-height: 300px" v-html="response"></div>
                <div class="history-container">
                    <h1>History</h1>
                    <table class="table">
                        <th>ID</th>
                        <th>Date</th>
                        <th>Temp</th>
                        <tr v-for="(historyData, key) in history" :key="key">
                            <td>{{ historyData.id }}</td>
                            <td>{{ historyData.date_at }}</td>
                            <td>{{ historyData.temp }} &#8451;</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                'date': null,
                'response': null,
                'pending': false,
                'history': [],
            }
        },
        methods: {
            request() {
                this.pending = true;

                axios.post('/api/get-by-date', {
                    'date_at': this.date,
                    'id': 1,
                })
                .then((result) => {
                    this.response = result.data.result.error !== undefined ? '<span class="error">Error: ' + result.data.result.error + "</span>" : 'Temperature ' + result.data.result.temp + ' &#8451; degrees';
                    this.pending = false;
                });
            }
        },
        mounted() {
            axios.post('/api/get-history', {
                'lastDays': 30,
                'id': 1,
            })
            .then((result) => {
                this.history = result.data.result;
            });
        }
    }
</script>
