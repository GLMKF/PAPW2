<template>
    <ul id="chat-app" class="d-flex justify-content-end m-0 p-0" style="list-style-type: none;">

        <li class="ml-3 dp-flex align-self-end">
            <div v-if="!isHidden"
            class="card bg-secondary card-size chat-option m-0 p-0"
            v-on:click="isHidden = true" style="height:30px; width:150px;">
                <label class="text-white" style="font-size:14px; color:#fff; margin:auto;padding:0;"><b>Chat</b></label>
            </div>
            <div 
            v-else
            class="card bg-secondary card-size">
                <div class="card-header m-0 p-0 ml-2"><b class="text-justify" style="font-size:14px; color:#fff;">Chat</b></div>
                <div class="card-body container-fluid m-0 p-3" style="height:400px; overflow-y: auto;">
                    <div class="row item-user" 
                        v-on:click="isHidden = false">
                        <div class="dp-block" style="width:190px;">
                            <b class="text-justify">Usuario</b>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    <div class="row">
                        <input class="form-control" type="text" name="buscador" placeholder="Buscar..."/>
                    </div>
                </div>
            </div>
        </li>
    </ul>
</template>

<script>
    export default {
        props: {
           me: Number //id user guest
        },
        data() {
            return {
                isHidden: false, //Mostrar la lista de usuarios
                list_users: [] //Lista de todos los usuarios
            }
        },
        mounted() {
            console.log('Component mounted.');
            console.log(this.me);
        }
    }
</script>
<style>
    .card-size {
        width: 200px;
    }
    .item-user {
        background:#212529;
        color:#fff;
    }
    .item-user div {
        font-size: 20px;
        margin:5px;
    }
    .item-user:hover {
        background: #c0caca;
        color:#000;
        cursor: pointer;
    }
    .chat-option:hover {
         cursor: pointer;
    }
</style>