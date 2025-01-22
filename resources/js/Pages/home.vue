<template>
    <v-app>
        <v-navigation-drawer app>
            <v-list>
                <v-list-item>
                    <v-list-item-title class="text-h6">Admin Dashboard</v-list-item-title>
                </v-list-item>
                <v-divider></v-divider>
                <v-list-item v-for="item in menuItems" :key="item.title" link>
                    <v-list-item-icon>
                        <v-icon>{{ item.icon }}</v-icon>
                    </v-list-item-icon>
                    <v-list-item-title>{{ item.title }}</v-list-item-title>
                </v-list-item>
            </v-list>
        </v-navigation-drawer>

        <v-app-bar app>
            <v-toolbar-title>Dashboard</v-toolbar-title>
            <v-spacer></v-spacer>
            <v-btn icon>
                <v-icon>mdi-bell</v-icon>
            </v-btn>
            <v-btn icon>
                <v-icon>mdi-account</v-icon>
            </v-btn>
        </v-app-bar>

        <v-main>
            <v-container>
                <v-row>
                    <v-col cols="12" md="4" v-for="card in cards" :key="card.title">
                        <v-card>
                            <v-card-title>{{ card.title }}</v-card-title>
                            <v-card-text>
                                <span class="text-h5">{{ card.value }}</span>
                            </v-card-text>
                        </v-card>
                    </v-col>
                </v-row>

                <v-data-table
                    :headers="headers"
                    :items="bookings"
                    class="mt-5"
                    item-value="id"
                    show-select
                ></v-data-table>
            </v-container>
        </v-main>
    </v-app>
</template>

<script>
export default {
    data() {
        return {
            menuItems: [
                { title: "Dashboard", icon: "mdi-view-dashboard" },
                { title: "Manage Bookings", icon: "mdi-calendar" },
                { title: "Manage Users", icon: "mdi-account-multiple" },
                { title: "Manage Services", icon: "mdi-tools" },
                { title: "Payments", icon: "mdi-cash" },
                { title: "Reports", icon: "mdi-file-chart" },
                { title: "Settings", icon: "mdi-cog" },
            ],
            cards: [
                { title: "Total Bookings", value: 120 },
                { title: "Revenue", value: "$4,500" },
                { title: "Available Slots", value: 35 },
            ],
            headers: [
                { text: "Booking ID", value: "id" },
                { text: "Customer Name", value: "customer_name" },
                { text: "Service", value: "service" },
                { text: "Date", value: "date" },
                { text: "Status", value: "status" },
            ],
            bookings: [
                {
                    id: 1,
                    customer_name: "John Doe",
                    service: "Room Booking",
                    date: "2025-01-10",
                    status: "Confirmed",
                },
                {
                    id: 2,
                    customer_name: "Jane Smith",
                    service: "Conference Hall",
                    date: "2025-01-11",
                    status: "Pending",
                },
            ],
        };
    },
};
</script>

<style>
/* Add any custom styles if needed */
</style>

