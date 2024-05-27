<script setup>
import { ref } from 'vue';
// import { Head } from '@inertiajs/vue3';
// import s
import { Head, Link, useForm } from '@inertiajs/vue3';
import NavLayout from '@/Layouts/NavLayout.vue';

// const form = useForm({
//     email: '',
//     password: ''
// });

// const submitForm = () => {
//     form.post('/login', {
//         onFinish: () => form.reset('email', 'password') // Reset password field after submission
//     });
// };
const form = useForm({
    email: '',
    password: '',
    // remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>
<template>
    <NavLayout>

        <Head title="Login Hub" />
        <div class="container py-16 flex justify-center min-h-screen">
            <div id="wrapper" class="wrapper px-32 py-16 h-max">
                <h2 class="mb-4 text-2xl font-extralight tracking-widest" style="opacity: 0.8;">SIGN IN</h2>
                <form @submit.prevent="submit">
                    <div class="form">
                        <div class="input-row second-row flex w-full justify-between">
                            <label class="email" for="email">
                                <h3 class="font-extralight tracking-widest mb-1" style="opacity: 0.7;">Email address
                                </h3>
                                <input class="text-black" style="min-width: 24rem;" type="email" name="email"
                                    v-model="form.email">
                            </label>
                        </div>
                        <div class="input-row password">
                            <label class="password" for="password">
                                <h3 class="font-extralight tracking-widest mb-1" style="opacity: 0.7;">Password</h3>
                                <input class="w-full text-black" type="password" name="password"
                                    v-model="form.password">
                            </label>
                        </div>
                        <div class="input-row2 btns">
                            <div class="flex justify-center mb-2 mt-6">
                                <button type="submit" id="login-btn" class="px-6 py-2 tracking-widest text-black">LOG
                                    IN</button>
                            </div>
                            <Link :href="route('create')"
                                class="flex justify-center text-lg font-extralight tracking-widest cursor-pointer"
                                style="font-weight: 200;" id="reg-btn">
                                REGISTER
                            <!-- <a href="#" class=""></a> -->
                            </Link>
                            <!-- <Link v-if="canRegister" :href="route('register')"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                            Register
                            </Link> -->
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </NavLayout>
</template>
<style scoped>
.container {
    background-color: #060606;
    color: #fff;
}

#wrapper {
    background-color: #141414;
    border: solid 1px rgba(255, 255, 255, 0.68);
}

.input-row {
    margin-bottom: 1rem;
}

h3 {
    font-weight: 200;
}

input {
    background-color: #ebebeb;
    /* color */
}

.terms-and-conditions {
    margin-bottom: 2rem;
}

#login-btn {
    background-color: #5DBEA3;
    transition: 500ms;
}

#login-btn:hover {
    cursor: pointer;
    background-color: #42a387;
}

#reg-btn {
    opacity: 0.7;
    transition: 500ms;
}

#reset-btn:hover {
    opacity: 0.9;
}
</style>