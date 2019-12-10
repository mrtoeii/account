<template>

    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <b-button v-b-modal.modal-1>Add</b-button>
                    <b-modal id="modal-1" title="Create Account" hide-footer>
                        <form @submit.prevent="onSubmit" enctype="multipart/form-data" >
                            <b-form-group label="Type">
                                <b-form-radio-group >
                                    <b-form-radio v-model="type"  name="type" value="revenue">Revenue</b-form-radio>
                                    <b-form-radio v-model="type"  name="type" value="expenses">Expenses</b-form-radio>
                                </b-form-radio-group>
                            </b-form-group>
                            <b-form-group label="Date" >
                                <b-form-input v-model="date" ></b-form-input>
                            </b-form-group>
                            <b-form-group label="List" >
                                <b-form-input v-model="list" ></b-form-input>
                            </b-form-group>
                            <b-form-group label="Amount" >
                                <b-form-input v-model="amount" ></b-form-input>
                            </b-form-group>
                            <b-form-group label="Description" >
                                <b-form-input v-model="description" ></b-form-input>
                            </b-form-group>
                            <b-form-group label="Receipt" >
                                <b-form-file  v-on:change="onImageChange"></b-form-file>
                            </b-form-group>
                            <b-form-group>
                            <b-button type='submit' variant="primary">Save</b-button>
                            </b-form-group>
                        </form>
                    </b-modal>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                     Account123
                </div>
            </div>
        </div>
    </div>


</template>
<script>
    export default {
        data(){
            return{
                type:'',
                date:'',
                list:'',
                amount:'',
                description:'',
                receipt:'',
            }
        },
        methods:{
            onImageChange(e){
                console.log(e.target.files[0]);
                this.receipt = e.target.files[0];
            },
            onSubmit:function (e){
                // console.log(this.type);
                // console.log(this.date);
                // console.log(this.list);
                // console.log(this.amount);
                // console.log(this.description);
                // console.log(this.receipt.name);
                e.preventDefault();
                let currentObj = this;

                axios.post('./api/accounts',{
                    type:this.type,
                    date:this.date,
                    list:this.list,
                    amount:this.amount,
                    description:this.description,
                    receipt:this.receipt,
                })
            }
        }
    }
</script>
