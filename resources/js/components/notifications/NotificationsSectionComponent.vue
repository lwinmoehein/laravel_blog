<template>
    <span class="nav-link px-3 py-1 mt-2 w-100"  role="button" @click="onNewNotificationsClick">
        <i class="fa fa-bell" :class="{'text-danger':newNotificationsCount>0}">{{newNotificationsCount}}</i>
    </span>
</template>

<script>
import Pusher from "pusher-js";

export default {
    name: "NotificationsSectionComponent",
    mounted() {
        this.initializePusher()
    },
    data(){
        return {
            newNotificationsCount:0
        }
    },
    computed:{
        isNotificationsNew(){
            return this.newNotificationsCount>0
        }
    },
    methods:{
        initializePusher(){
            const token =  document.querySelector('meta[name="csrf-token"]').content
            console.log("token:"+token)
            Pusher.logToConsole = true;

            const pusher = new Pusher('364175ab60b83d8bf249', {
                cluster: 'us2',
                authEndpoint: "/broadcasting/auth",
                auth: {
                    headers:{
                        "X-CSRF-TOKEN": token
                    }
                }
            });

            const channel = pusher.subscribe('private-app-notifications');
            channel.bind('got-new-notification', function(data) {

                this.newNotificationsCount=1
                alert(this.newNotificationsCount)
            });
        },
        onNewNotificationsClick(){
             this.newNotificationsCount = 0
        }
    }
}
</script>

<style scoped>

</style>
