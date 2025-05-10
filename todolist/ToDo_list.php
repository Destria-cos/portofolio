<?php
session_start();
include '../koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>To-Do List Cosmi</title>
  <style>
    body {
      font-family: sans-serif;
      background: #f4f4f4;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .container {
      background: white;
      padding: 20px;
      border-radius: 12px;
      width: 320px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    h1 {
      text-align: center;
      margin-bottom: 20px;
    }

    .input-section {
      display: flex;
      gap: 10px;
    }

    input[type="text"] {
      flex: 1;
      padding: 8px;
    }

    button {
      padding: 8px 12px;
      background: #4CAF50;
      color: white;
      border: none;
      border-radius: 6px;
      cursor: pointer;
    }

    button:hover {
      background: #45a049;
    }

    ul {
      list-style: none;
      padding: 0;
      margin-top: 20px;
    }

    li {
      background: #eee;
      margin-bottom: 10px;
      padding: 10px;
      border-radius: 6px;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .left {
      display: flex;
      align-items: center;
      gap: 10px;
      flex: 1;
    }

    li.completed span {
      text-decoration: line-through;
      color: gray;
    }

    input[type="checkbox"] {
      transform: scale(1.2);
      cursor: pointer;
    }

    .delete-btn {
      background: none;
      border: none;
      font-size: 16px;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>To-Do List 📝</h1>
    <div class="input-section">
      <input type="text" id="taskInput" placeholder="Tambah tugas...">
      <button onclick="addTask()">Tambah</button>
    </div>
    <ul id="taskList"></ul>
  </div>

  <script>
    let taskList = JSON.parse(localStorage.getItem("tasks")) || [];

    function saveTasks() {
      localStorage.setItem("tasks", JSON.stringify(taskList));
    }

    function renderTasks() {
      const list = document.getElementById("taskList");
      list.innerHTML = "";

      taskList.forEach((task, index) => {
        const li = document.createElement("li");
        li.className = task.completed ? "completed" : "";

        li.innerHTML = `
          <div class="left">
            <input type="checkbox" ${task.completed ? "checked" : ""} onchange="toggleComplete(${index})">
            <span>${task.text}</span>
          </div>
          <button class="delete-btn" onclick="deleteTask(${index})">❌</button>
        `;

        list.appendChild(li);
      });
    }

    function addTask() {
      const input = document.getElementById("taskInput");
      const text = input.value.trim();
      if (text !== "") {
        taskList.push({ text, completed: false });
        input.value = "";
        saveTasks();
        renderTasks();
      }
    }

    function deleteTask(index) {
      taskList.splice(index, 1);
      saveTasks();
      renderTasks();
    }

    function toggleComplete(index) {
      taskList[index].completed = !taskList[index].completed;
      saveTasks();
      renderTasks();
    }

    renderTasks();
  </script>
</body>
</html>
