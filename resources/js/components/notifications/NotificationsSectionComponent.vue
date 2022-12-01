<template>
    <div>
        Notifications
    </div>
</template>

<script>
import Pusher from "pusher-js";

export default {
    name: "NotificationsSectionComponent",
    mounted() {
        this.initializePusher()
    },
    methods:{
        initializePusher(){
            Pusher.logToConsole = true;

            var pusher = new Pusher('364175ab60b83d8bf249', {
                cluster: 'us2'
            });

            var channel = pusher.subscribe('app-notifications');
            channel.bind('new-notifications', function(data) {
                alert(JSON.stringify(data));
            });


        }
    }
}
</script>

<style scoped>

</style>
