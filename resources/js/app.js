import { createApp } from "vue";
import Echo from "laravel-echo";
import Pusher from "pusher-js";

import App from "./components/App.vue";

window.Pusher = Pusher;

console.log("Pusher key:", import.meta.env.VITE_PUSHER_APP_KEY);
console.log("Pusher cluster:", import.meta.env.VITE_PUSHER_APP_CLUSTER);

window.Echo = new Echo({
    broadcaster: "pusher",
    key: import.meta.env.VITE_PUSHER_APP_KEY,
    cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
    forceTLS: true,
});

console.log("Echo создан:", window.Echo);

window.Echo.channel("test")
    .subscribed(() => {
        console.log("✅ Echo подключился к каналу test");
    })
    .error((error) => {
        console.error("❌ Ошибка канала test:", error);
    });

const app = createApp(App);

app.mount("#app");
