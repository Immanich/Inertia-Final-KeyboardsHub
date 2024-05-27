<script setup>
// import { Head, Link, ref } from 'vue';

import { Head, Link, useForm  } from '@inertiajs/vue3';
import NavLayout from '@/Layouts/NavLayout.vue';

// import InputError from '@/Components/InputError.vue';

const form = useForm({
    first_name: '',
    last_name: '',
    email: '',
    region: '',
    password: '',
    confirm_password: '',
})


const submit = async () => {
    try {
        await form.post("/create");
    } catch (error) {
        if (error.response && error.response.status === 500) {
            // Handle duplicate entry error
            alert("Duplicate entry detected. Please check your input.");
            // Redirect or navigate back to the create form
            router.push('/create');
        } else {
            // Handle other errors
            console.error("Error:", error);
            alert("An error occurred. Please try again later.");
        }
    }
};

defineProps({
    canLogin: {
        type: Boolean,
    },
});
</script>
<template>
    <NavLayout>

        <Head title="Create Account" />
        <div class="container px-32 py-8 flex justify-center min-h-screen">
            <div id="wrapper" class="wrapper p-8 h-max">
                <h2 class="mb-4 text-2xl font-extralight tracking-widest" style="opacity: 0.7;">CREATE HUB ACCOUNT</h2>
                <form action="/" method="post" @submit.prevent="submit">
                    <div class="form">
                        <div class="input-row first-row flex justify-between">
                            <label class="first-name" for="first-name">
                                <h3 class="font-extralight tracking-widest" style="opacity: 0.68;">First name</h3>
                                <input class="text-black" style="min-width: 16rem;" type="text" name="first-name"
                                    v-model="form.first_name">

                                <!-- <InputError class="mt-2" : message="form.errors.name" /> -->
                            </label>
                            <label class="last-name" for="last-name">
                                <h3 class="font-extralight tracking-widest" style="opacity: 0.68;">Last name</h3>
                                <input class="text-black" style="min-width: 16rem;" type="text" name="last-name"
                                    v-model="form.last_name">
                            </label>
                        </div>
                        <div class="input-row second-row flex w-full justify-between">
                            <label class="email" for="email">
                                <h3 class="font-extralight tracking-widest" style="opacity: 0.68;">Email address</h3>
                                <input class="text-black" style="min-width: 16rem;" type="email" name="email"
                                    v-model="form.email">
                            </label>
                            <label class="region" for="region">
                                <h3 class="font-extralight tracking-widest" style="opacity: 0.68;">Region</h3>
                                <input class="text-black" style="min-width: 16rem;" type="text" name="region"
                                    v-model="form.region">
                            </label>
                        </div>
                        <div class="input-row password">
                            <label class="password" for="password">
                                <h3 class="font-extralight tracking-widest" style="opacity: 0.68;">Password</h3>
                                <input class="w-full text-black" type="password" name="password"
                                    v-model="form.password">
                            </label>
                        </div>
                        <div class="input-row confirm-password">
                            <label class="confirm-password" for="confirm-password">
                                <h3 class="font-extralight tracking-widest" style="opacity: 0.68;">Confirm Password</h3>
                                <input class="w-full text-black" type="password" name="confirm-password"
                                    v-model="form.confirm_password">
                            </label>
                        </div>
                        <div class="input-row promotions">
                            <input class="mr-1" type="checkbox" name="promotions">
                            <label class="font-extralight tracking-widest" for="promotions" style="opacity: 0.68;">
                                Sign me up for hub news and promotions
                            </label>
                        </div>
                        <div class="input-row terms-and-conditions">
                            <input class="mr-1" type="checkbox" name="terms-and-conditions">
                            <label class="font-extralight tracking-widest" for="terms-and-conditions"
                                style="opacity: 0.68;">
                                I have read and agree to the terms of use and privacy policy.
                            </label>
                        </div>
                        <div class="input-row btns flex justify-between">
                            <button type="submit" id="sign-up-btn" class="px-3 py-2 tracking-widest text-black">SIGN
                                UP</button>
                            <Link :href="route('open')" style="font-weight: 200; opacity: 0.7;"
                                class="font-extralight tracking-widest opacity">BACK</Link>
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
    overflow: hidden;
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

#sign-up-btn {
    background-color: #5DBEA3;
    transition: 500ms;
}

#sign-up-btn:hover {
    cursor: pointer;
    background-color: #33B249;
}
</style>