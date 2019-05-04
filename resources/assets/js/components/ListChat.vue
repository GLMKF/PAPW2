<template>
   <ul id="chat-app" class="chat-flotante" style="list-style-type: none; padding:0em;">
        
        <ChatUser  
        v-for='(user, index) in users' 
        :key='index' 
        :childNumber="index+1" 
        v-on:removeChild="removeChild" :user="user" :me="me"/>
        
        <li class="recuadro-chat" style="width:200px;">
            <div v-if="!isHidden"
            class="custom-card-hide"
            v-on:click="isHidden = true" style="height:30px; width:200px;">
                <label class="text-white" style="font-size:14px; color:#fff; margin:auto;padding:0;"><b>Chat</b></label>
            </div>
            <div 
            v-else
            class="custom-card-show-general">
                <div class="custom-card-show-title"><b class="text-justify" style="font-size:14px; color:#fff;">Chat</b></div>
                <div class="custom-card-fluid" style="height:400px; overflow-y: auto;">
                    <div class="row item-user" 
                        v-for="user in list_users"
                        v-if="search_user(user.name)"
                        v-on:click="isHidden = show_chat(user)" style="width:107%;">
                        <div class="dp-block" style="width:180px;">
                            <b class="text-justify">{{user.name}}</b>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    <div class="row" style="padding-left:15px;">
                        <input v-model="bowser_user" class="form-control" type="text" name="buscador" placeholder="Buscar..." style="width:200px;"/>
                    </div>
                </div>
            </div>
        </li>
    </ul>
</template>

<script>
/**
Comunicacion de componentes
https://stackoverflow.com/questions/45709710/vue-delete-child-component
Conceptos basicos: data, metodos, props, event handling,
avanzado:  comunicar vue padre con vue hijo, manejos de emmiters*/
import ChatUser from './ChatUser.vue'
    export default {
        props: {
           me: Number
        },
        data() {
            return {
                isHidden: false,
                bowser_user: "",
                list_users: [],
                users:[]
            }
        },
        mounted() {
            console.log('Component mounted.');
            console.log(this.me);
            this.usersAll();
            this.anysc_listener_notify();
        },
        methods: {
            show_chat: function(user) {
                //this.users.push(user);
                this.add_user(user);
                this.bowser_user = "";
                return false;
            },
            search_user: function(name) {
                return name.match(new RegExp(this.bowser_user, 'i')) ? true : false;
            },
            removeChild: function(index) {
                this.users.splice(index - 1, 1);
            },
            usersAll: function() {
                //abrir php.ini
                //hacer un set always_populate_raw_post_data = -1
                axios.post('http://127.0.0.1:8000/usersAll',
                { me: this.me})
                .then((res) => {
                    console.log(res);
                    this.list_users = res.data;
                    console.log(this.list_users);
                })
                .catch((err) => {
                    console.log(err)
                });
            },
            timeout: function(ms) {
                return new Promise(resolve => setTimeout(resolve, ms));
            },
            anysc_listener_notify: async function(){
                var goOn = true;
                while (goOn) {
                    console.log('Buscando notificaciones... ');
                    await axios.post('http://127.0.0.1:8000/listenerNotify',{
                        me: this.me
                    })
                    .then((res) => {
                        if(res.data.length != 0 ? true : false) {
                            var users_ = res.data;
                            for (var i = 0; i < users_.length; i++) {
                                this.add_user(users_[i]);
                            }
                        }
                    })
                    .catch((err) => {
                        console.log(err)
                    });
                    await this.timeout(5000);
                }
            },
            add_user: function(u) {
                for (var i = 0; i < this.users.length; i++) {
                    // Iterate over numeric indexes from 0 to 5, as everyone expects.
                    if(u.id === this.users[i].id) {
                        this.users[i].hide = 1;
                        return;
                    }
                }
                this.users.push(u);
            }
        },
        components: {
            ChatUser
        }
    }
</script>


<style>
    .chat-flotante{
        background: rgba(59, 70, 168, 0.9);
        border-style: hidden;
    }
    label{
        cursor: pointer;
    }
    .custom-card-hide{
        text-align: center;
        background: rgba(46, 200, 102, 0.6);
        border-style: hidden;
        border-radius: 6em;
    }
    .custom-card-show-general{
        text-align: center;
        background: rgba(46, 102, 200, 0.9);
        border-style: hidden;
    }
    .custom-card-show-title{
        text-align: center;
        background: forestgreen;
        border-style: hidden;
    }
    .custom-card-show-fluid{
        text-align: center;
        background: darkseagreen;
        border-style: hidden;
        border-radius: 6em;
    }
    .recuadro-chat{
        height: 100%;
        width: 100%;
    }
    .dp-block{
        width:100%;
    }
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