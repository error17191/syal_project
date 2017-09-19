var searchInput = document.querySelector('#search');
var checkinInput = document.querySelector('#checkin');
var checkoutInput = document.querySelector('#checkout');
var searchChosen = false;
var suggestionsList = document.querySelector('#search_suggestions');
var suggestions = [];
var roomsContainer = document.querySelector('#rooms');
var roomElement = document.querySelector('#templates_room #room_1');
var lastSearchedFor = '';
var submitButton = document.querySelector('#submit')

var searchData = {
    rooms: [],
    checkin: '',
    checkout: '',
    destination: ''
};
var selectedSuggestion;

$(function () {
    suggestions = commonData.topSuggestions;
    updateSuggestionList(suggestions);
    addNewRoom();
});

function onSearchInputKeyup() {
    this.lastValue = this.lastValue || "";
    if (this.lastValue == searchInput.value) {
        return true;
    } else {
        this.lastValue = searchInput.value;
    }
    if (!searchInput.value) {
        suggestions = commonData.topSuggestions;
        updateSuggestionList(commonData.topSuggestions);
        return false;
    }
    updateSuggestionsData();
}


function onSearchInputFocus() {
    if (searchChosen) {
        searchChosen = false;
        searchInput.classList.remove('chosen');
        searchInput.value = lastSearchedFor;
        searchData.destination = '';
        enableSubmit();
    }
    suggestionsList.classList.remove('hidden');
}

function onSearchInputBlur(e) {
    if (e.relatedTarget && e.relatedTarget.classList.contains('suggestion')) {
        onSuggestionSelected(e.relatedTarget.getAttribute('data-index'));
    }
    suggestionsList.classList.add('hidden');
}

function updateSuggestionsData() {
    $.ajax({
        method: 'GET',
        url: urls.suggestions,
        data: {
            query: searchInput.value
        },
        success: function (data, textStatus, jqXHR) {
            suggestions = data;
            updateSuggestionList(suggestions);
        }
    });

}

function updateSuggestionList() {
    suggestionsList.innerHTML = "";
    if (suggestions.length === 0) {
        suggestionsList.innerHTML = '<li class="list-group-item">No results</li>';
    }
    for (var i = 0; i < suggestions.length; i++) {
        var suggestion = document.createElement('a');
        suggestion.href = "#";
        suggestion.classList.add('list-group-item');
        suggestion.classList.add('suggestion');
        suggestion.setAttribute('data-index', i);
        suggestion.innerHTML = suggestions[i].country_name + " - " + suggestions[i].destination_name + " - (" + suggestions[i].hotels_count + ")";
        suggestionsList.appendChild(suggestion);
    }
}

function addNewRoom() {
    roomNumber = searchData.rooms.length;
    searchData.rooms.push({
        adults: 1,
        children_ages: [],
    });
    var roomNumber = searchData.rooms.length;
    var roomClone = roomElement.cloneNode(true);
    roomClone.id = 'room_' + roomNumber;
    roomClone.setAttribute('data-index', roomNumber - 1);
    roomClone.querySelector('h5').innerText = 'room #' + roomNumber;
    $(roomsContainer).find('.remove_room_container').addClass('hidden');
    if (roomNumber > 1) {
        $(roomClone).find('.remove_room_container').removeClass('hidden');
    }
    $(roomsContainer).append($(roomClone));
}

function removeRoom() {
    searchData.rooms.pop();
    $(roomsContainer).find('.room').last().remove();
    if (searchData.rooms.length > 1) {
        $(roomsContainer).find('.room .remove_room_container').last().removeClass('hidden');
    }
}

function onSuggestionSelected(index) {
    selectedSuggestion = suggestions[index];
    lastSearchedFor = searchInput.value;
    searchChosen = true;
    searchInput.value = selectedSuggestion.country_name + " - " + selectedSuggestion.destination_name;
    searchInput.classList.add('chosen');
    searchData.destination = selectedSuggestion.destination_code;
    enableSubmit();
}

function enableSubmit() {
    if (searchData.checkin && searchData.checkout && searchData.destination) {
        $(submitButton).prop('disabled', false)
    } else {
        $(submitButton).prop('disabled', true);
    }
}

function fillZeros(num) {
    if (num <= 9) {
        return "0" + num;
    }
    return num;
}

searchInput.addEventListener('keyup', onSearchInputKeyup, false);
searchInput.addEventListener('focus', onSearchInputFocus, false);
searchInput.addEventListener('blur', onSearchInputBlur, false);
document.querySelector('#add_room').addEventListener('click', function () {
    addNewRoom();
}, false);


checkinInput.addEventListener('change', function () {
    if (this.value == '') {
        $(checkoutInput).prop('disabled', true);
        checkoutInput.value = '';
        searchData.checkout = '';
    } else {
        $(checkoutInput).prop('disabled', false);
    }
    var now = Date.now();
    var date = Date.parse(this.value);
    if (date < now) {
        var currentDate = new Date(now);
        this.value = currentDate.getFullYear() + "-" + fillZeros(currentDate.getMonth() + 1) + "-" + fillZeros(currentDate.getDate());
    }
    searchData.checkin = this.value;
    enableSubmit();
}, false);

checkoutInput.addEventListener('change', function () {
    if (Date.parse(this.value) <= Date.parse(searchData.checkin)) {
        var date = new Date(Date.parse(searchData.checkin));
        date = new Date(date.setDate(date.getDate() + 1));
        this.value = date.getFullYear() + "-" + fillZeros(date.getMonth() + 1) + "-" + fillZeros(date.getDate());
    }
    searchData.checkout = this.value;
    enableSubmit();
}, false);

submitButton.addEventListener('click', function () {
    window.location = urls.results + '?' + $.param(searchData);
}, false);

$('body').on('click', '.suggestion', function (e) {
    e.preventDefault();
});
$('body').on('click', '.remove_room', function () {
    removeRoom();
});

$('body').on('change', '.room [name=adults]', function () {
    var $room = $(this).closest('.room');
    var $children = $room.find('[name=children]');
    var $childages = $room.find('.child_age');
    if (this.value == 3) {
        $children.find('option').removeClass('hidden');
        $children.find('option:gt(1)').addClass('hidden');
        if ($children.val() > 1) {
            $children.val(1);
            $children.change();
        }
    } else if (this.value == 4) {
        $children.find('option').removeClass('hidden');
        $children.find('option:gt(0)').addClass('hidden');
        if ($children.val() > 0) {
            $children.val(0);
            $children.change();
        }
    } else {
        $children.find('option').removeClass('hidden');
    }
    var room = searchData.rooms[$room.data('index')];
    room.adults = this.value;
});

$('body').on('change', '.room [name=children]', function () {
    var $room = $(this).closest('.room');
    var $childages = $room.find('.child_age');
    if (this.value == 1) {
        $room.find('.child_age select').last().val('0');
        $room.find('.child_age').last().addClass('hidden');
        $room.find('.child_age').first().removeClass('hidden');
    } else if (this.value == 2) {
        $(this).closest('.room').find('.child_age').removeClass('hidden');
    } else {
        $(this).closest('.room').find('.child_age select').val('0');
        $(this).closest('.room').find('.child_age').addClass('hidden');
    }
    var room = searchData.rooms[$room.data('index')];
    room.children_ages = [];
    for (i = 0; i < this.value; i++) {
        room.children_ages.push($childages.eq(i).find('select').val());
    }
});
$('body').on('change', '.room .child_age select', function () {
    var $room = $(this).closest('.room');
    var room = searchData.rooms[$room.data('index')];
    room.children_ages[$(this).data('index')] = this.value;
})
