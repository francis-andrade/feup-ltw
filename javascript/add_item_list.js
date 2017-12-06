let form = document.getElementById('addlist');
let table = document.getElementById('tablelist');
if(form) {
  form.addEventListener('submit', submitItem);
}

function encodeForAjax(data) {
  return Object.keys(data).map(function(k){
    return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
  }).join('&');
}

function submitItem(event) {

  let description = document.querySelector('input[name=description]').value;
  let assigneed = document.querySelector('input[name=assigneed]').value;
  let datedue = document.querySelector('input[name=datedue]').value;
  let listid = document.querySelector('input[name=id]').value;
  let itemid = document.querySelector('#list #tablelist') != null ? document.querySelector('#list .itemid:last-of-type').textContent : -1;
  let request = new XMLHttpRequest();
  request.addEventListener('load', receiveItems);
  request.open('POST', 'api_add_item.php', true);
  request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  request.send(encodeForAjax({itemid: itemid, listid: listid, description: description, assigneed: assigneed, datedue: datedue}));
  event.preventDefault();

}

function receiveItems(data) {
  let table = document.querySelector('#tablelist');
  let items = JSON.parse(this.responseText);

  for (let i = 0; i < items.length; i++) {
    let item = document.createElement('tr');
    item.classList.add('comment');

      item.innerHTML = '<td><p>' + item[i].descr + '</p></td>' +
                          '<td><p>' + item[i].assignee + '</p></td>' +
                          '<td><p>' + item[i].datedue + '</p></td>' +
                          '<td><input type="checkbox" name="solved" value=' + item[i].solved + '></td>';

    table.append(item);
  }
}