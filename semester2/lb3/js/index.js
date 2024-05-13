const groupSelect = document.getElementById('group');
const teacherSelect = document.getElementById('teacher');
const auditoriumSelect = document.getElementById('auditorium');

async function getGroups() {
    const response = await fetch('php/getGroups.php');
    const groups = await response.json();
    groups.forEach(group => {
        const option = document.createElement('option');
        option.value = group["ID_Groups"];
        option.textContent = group.title;
        groupSelect.appendChild(option);
    })
}

async function getTeachers() {
    const response = await fetch('php/getTeachers.php');
    const teachers = await response.json();
    teachers.forEach(teacher => {
        const option = document.createElement('option');
        option.value = teacher["ID_Teacher"];
        option.textContent = teacher.name;
        teacherSelect.appendChild(option);
    })
}

async function getAuditoriums() {
    const response = await fetch('php/getAuditoriums.php');
    const auditoriums = await response.json();
    auditoriums.forEach(auditorium => {
        const option = document.createElement('option');
        option.value = auditorium["auditorium"];
        option.textContent = auditorium["auditorium"];
        auditoriumSelect.appendChild(option);
    })
}

async function getByGroup() {
    const groupID = groupSelect.value;
    const response = await fetch('php/getByGroup.php?group=' + groupID);
    const lessons = await response.json();
    renderTable(lessons);
}

async function getByTeacher() {
    const teacherID = teacherSelect.value;
    const response = await fetch('php/getByTeacher.php?teacher=' + teacherID);
    const lessons = await response.json();
    renderTable(lessons);
}

async function getByAuditorium() {
    const auditorium = auditoriumSelect.value;
    const response = await fetch('php/getByAuditorium.php?auditorium=' + auditorium);
    const lessons = await response.json();
    renderTable(lessons);
}

function renderTable(lessons) {
    const table = document.getElementById('table');
    const tbody = table.querySelector("tbody");
    tbody.innerHTML = '';

    lessons.forEach(lesson => {
        const tr = document.createElement('tr');
        tr.innerHTML = `
                <td>${lesson['week_day']}</td>
                <td>${lesson['lesson_number']}</td>
                <td>${lesson['auditorium']}</td>
                <td>${lesson['disciple']}</td>
                <td>${lesson['name']}</td>
                <td>${lesson['type']}</td>
            `;
        tbody.appendChild(tr);
    })
    table.removeAttribute("hidden");
}

getGroups()
getTeachers()
getAuditoriums()

