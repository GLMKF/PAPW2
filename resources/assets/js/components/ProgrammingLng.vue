<template>
    <div>
        <div class="row">
            <template v-if="showField">
                <div class="form-group">
                    <label for="language">Lenguaje:</label>
                    <input list="languages" id="language" name="language"
                    required v-model="newItem.language" placeholder="Escoge un lenguaje">
                    <datalist id="languages">
                        <option value="CSS and HTML"></option>
                        <option value="JAVA"></option>
                        <option value="C"></option>
                        <option value="C++"></option>
                        <option value="PHP"></option>
                        <option value="VUE J/S"></option>
                        <option value="REACT"></option>
                        <option value="JAVASCRIPT"></option>
                        <option value="C#"></option>
                        <option value="VisualBasic"></option>
                        <option value=".Net"></option>
                    </datalist>
                </div>
                <div class="form-group">
                    <label for="percent">Cual es tu nivel:</label>
                    <input type="number" class="form-control" id="percent" name="percent"
                    required v-model="newItem.percent" placeholder="Cual es tu nivel 5 al 100"
                    min="5" max="100">
                </div>
                <div>
                    <button class="btn btn-primary" @click.prevent="createItem()" style="float:left;">
                        <span class="glyphicon glyphicon-plus"></span> ADD
                    </button>
                    <button class="btn btn-primary" @click.prevent="cancelLng()" style="float:left;">
                        <span class="glyphicon glyphicon-plus"></span> Cancelar
                    </button>
                </div>
            </template>
            <template v-for="item in items">
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="radial-prog-area margin-b-30">
                        <ProgressLng :min="0" :max="100" :value="item.percent" :text="item.language"></ProgressLng>
                        <div id="show-modal" @click="showModal=true; setVal(item)"  class="btn btn-info" ><span
                        class="lnr lnr-pencil"></span></div>
                        <div @click.prevent="deletelng(item)" class="btn btn-danger"><span
                        class="lnr lnr-trash"></span></div>
                    </div>
                </div>
            </template>
            <template v-if="!showField">
                <div>
                    <button @click.prevent="showField=true" class="btn btn-primary" style="float:left;">
                        <span class="glyphicon glyphicon-plus"></span> Nuevo
                    </button>
                </div>
            </template>
            <p class="text-center alert alert-danger"
                v-bind:class="{ hidden: hasError }">Por favor llene los campos!</p>
        </div>
        <div class="row" v-if="showModal" @close="showModal=false">
            <h3 slot="header">Edit Item</h3>
            <div slot="body">
                Lenguaje: {{ this.editItem.language }}
                Profession: <input type="number" class="form-control" id="e_percent" name="percent"
                required  :value="this.editItem.percent" placeholder="Cual es tu nivel 5 al 100"
                min="5" max="100">
            </div>
            <div slot="footer">
                <button class="btn btn-default" @click="showModal = false; editItem={};">
                Cancel
            </button>
            
            <button class="btn btn-info" @click="editLng()">
                Update
            </button>
            </div>
        </div>
    </div>
</template>

<script>
import ProgressLng from './LngPercent.vue'
    export default {
        props: {
            email:String
        },
        data() {
            return { 
              items: [], //Alls Programming Language of user
              hasError: true, //Validate
              newItem: { 'user': '','language': '','percent': '' },
              showField: false,
              showModal: false,
              editItem: {'user': '','language': '','percent': '' }
            }
        },
        mounted() {
            console.log('Component ProgrammingLng mounted.');
            this.getVueItems();  
        },
        methods: {
            createItem: function createItem() {
                var _this = this;
                this.newItem.user = this.email;
                var input = this.newItem;
            
                if (input['language'] == '' || input['percent'] == '') {
                    this.hasError = false;
                } else {
                    this.hasError = true;
                    console.log(input);
                    if(input.percent > 100)
                        input.percent = 100;
                    else if(input.percent < 5)
                        input.percent = 5;
                    axios.post('/SaveLng', input).then(function (response) {
                        _this.getVueItems();
                    });
                    return;
                }
            },
            cancelLng: function () {
                this.showField=false;
                this.newItem.user = '';
                this.newItem.language = '';
                this.newItem.percent = '';
            },
            getVueItems: function getVueItems() {
                var _this = this;
                axios.get('/getLng',{
                    params: {
                        email: this.email
                        }
                    }).then(function (response) {
                    _this.items = response.data.lngs;
                    console.log(_this.items);
                });
            },
            setVal: function setVal(item) {
                this.editItem = item;
            },
            editLng: function editLng() {
                var percent = document.getElementById('e_percent');
                if(percent.value > 100)
                    this.editItem.percent = 100;
                else if(percent.value < 5)
                    this.editItem.percent = 5;
                else
                    this.editItem.percent = percent.value;
                axios.post('/updateLng',this.editItem
                )
                .then(response => {
                    this.getVueItems();
                    this.showModal=false;
                });   
            },
            deletelng: function deletelng(item) {
                axios.post('/deleteLng',item)
                .then(response => {
                    this.getVueItems();
                    this.showModal=false;
                });
            }
        },
        components: {
            ProgressLng
        }
    }
    
</script>

<style>
.btnvue{
    background-color:#cacaca; 
    border-radius:5px;
}
.standard{
    line-height: 1; 
    float: center;
    font-size: 22px;
    padding: auto;
    margin: auto;
}
.modal-mask {
  position: fixed;
  z-index: 9998;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, .5);
  display: table;
  transition: opacity .3s ease;
}
.modal-wrapper {
  display: table-cell;
  vertical-align: middle;
}
.modal-container {
  width: 300px;
  margin: 0px auto;
  padding: 20px 30px;
  background-color: #fff;
  border-radius: 2px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, .33);
  transition: all .3s ease;
  font-family: Helvetica, Arial, sans-serif;
}
.modal-header h3 {
  margin-top: 0;
  color: #42b983;
}
.modal-body {
  margin: 20px 0;
}
</style>