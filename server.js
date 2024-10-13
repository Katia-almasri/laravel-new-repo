import express from "express";
import http from "http";
import { Server } from "socket.io";
import Redis from "ioredis";

const app = express();
const server = http.createServer(app);
const io = new Server(server, {
    cors: {
        origin: "*",
        methods: ["GET", "POST"],
    },
});

const redis = new Redis();

// Socket server listens for the incoming messages
server.listen(6001, function () {
    console.log("Socket.IO server running on port 6001");
});

// Socket Server Subscribes to the Laravel Redis channel for events
redis.subscribe("chat.user-channel", function (err, count) {
    console.log("Subscribed to the Redis channel");
});

// Socket Server Listens for messages on the Redis channel
redis.on("message", function (channel, message) {
    try {
        const parsedMessage = JSON.parse(message);
        console.log(parsedMessage.data);

        //emit the messages to all the connected clients
        io.emit("chat.user-channel", parsedMessage);
    } catch (err) {
        console.error("Error parsing message: ", err);
    }
});
