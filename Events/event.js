const eventsContainer = document.getElementById('events-container');
const eventForm = document.getElementById('event-form');

let upcomingEvents = [
  {
    id: 1,
    title: "Brother's Wedding",
    date: "2023-06-01"
  },
  {
    id: 2,
    title: "Event 2",
    date: "2023-06-15"
  },
  {
    id: 3,
    title: "Holiday 1",
    date: "2023-07-04"
  }
];

function formatDate(dateString) {
  const options = { month: 'long', day: 'numeric', year: 'numeric' };
  return new Date(dateString).toLocaleDateString(undefined, options);
}

function displayEvents() {
     // Sort the upcoming events by date in ascending order
  upcomingEvents.sort((a, b) => new Date(a.date) - new Date(b.date));

  eventsContainer.innerHTML = "";

  upcomingEvents.forEach(event => {
    const eventElement = document.createElement('div');
    eventElement.classList.add('event');

    const titleElement = document.createElement('h2');
    titleElement.classList.add('event-title');
    titleElement.textContent = event.title;

    const dateElement = document.createElement('p');
    dateElement.classList.add('event-date');
    dateElement.textContent = formatDate(event.date);

    const deleteButton = document.createElement('button');
    deleteButton.classList.add('delete-button');
    deleteButton.textContent = 'Delete';
    deleteButton.addEventListener('click', () => deleteEvent(event.id));

    const updateButton = document.createElement('button');
    updateButton.classList.add('update-button');
    updateButton.textContent = 'Update';
    updateButton.addEventListener('click', () => openUpdateModal(event));

    eventElement.appendChild(titleElement);
    eventElement.appendChild(dateElement);
    eventElement.appendChild(deleteButton);
    eventElement.appendChild(updateButton);
    eventsContainer.appendChild(eventElement);
  });
}

function addEvent(event) {
  upcomingEvents.push(event);
  displayEvents();
  eventForm.reset();
}

function deleteEvent(eventId) {
  upcomingEvents = upcomingEvents.filter(event => event.id !== eventId);
  displayEvents();
}

function updateEvent(eventId, updatedEvent) {
  const index = upcomingEvents.findIndex(event => event.id === eventId);
  if (index !== -1) {
    upcomingEvents[index] = updatedEvent;
    displayEvents();
  }
}

function openUpdateModal(event) {
  const updateModal = document.createElement('div');
  updateModal.classList.add('update-modal');

  const updateTitleLabel = document.createElement('label');
  updateTitleLabel.textContent = 'Updated Title:';
  const updateTitleInput = document.createElement('input');
  updateTitleInput.type = 'text';
  updateTitleInput.value = event.title;

  const updateDateLabel = document.createElement('label');
  updateDateLabel.textContent = 'Updated Date:';
  const updateDateInput = document.createElement('input');
  updateDateInput.type = 'date';
  updateDateInput.value = event.date;

  const updateButton = document.createElement('button');
  updateButton.textContent = 'Update';
  updateButton.addEventListener('click', () => {
    const updatedEvent = {
      id: event.id,
      title: updateTitleInput.value,
      date: updateDateInput.value
    };
    updateEvent(event.id, updatedEvent);
    document.body.removeChild(updateModal);
  });

  const cancelButton = document.createElement('button');
  cancelButton.textContent = 'Cancel';
  cancelButton.addEventListener('click', () => {
    document.body.removeChild(updateModal);
  });

  updateModal.appendChild(updateTitleLabel);
  updateModal.appendChild(updateTitleInput);
  updateModal.appendChild(updateDateLabel);
  updateModal.appendChild(updateDateInput);
  updateModal.appendChild(updateButton);
  updateModal.appendChild(cancelButton);

  document.body.appendChild(updateModal);
}

eventForm.addEventListener('submit', function(event) {
  event.preventDefault();

  const titleInput = eventForm.elements['event-title'];
  const dateInput = eventForm.elements['event-date'];

  const eventTitle = titleInput.value;
  const eventDate = dateInput.value;

  if (eventTitle && eventDate) {
    const newEvent = {
      id: Math.floor(Math.random() * 1000), // Generate a random ID for the new event
      title: eventTitle,
      date: eventDate
    };

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "handle.php", true);
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4 && xhr.status === 200) {
        var response = xhr.responseText;
        console.log(response);
      }
    };
    var data = {
      title: eventTitle,
      date: eventDate,
      addBtn: eventTitle
    };
    var jsonData = JSON.stringify(data);
    xhr.send(jsonData);
    addEvent(newEvent);
  }
});

window.addEventListener('load', displayEvents);
