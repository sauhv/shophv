fetch('js/API/Provinces.json')
  .then(response => response.json())
  .then(data => {
    let provinces = data.data.data;
    provinces.map(value => document.getElementById('provinces').innerHTML += `<option value='${value.name}'>${value.name}</option>`);
  })
  .catch(error => {
    console.error('Lỗi khi gọi API:', error);
  });

let container = document.getElementById('categoryList');
fetch('http://localhost:8000/api/getCategory')
.then(response => response.json())
.then(data => {
    // data.map(item => document.getElementById('categoryList').innerHTML += `<li class="nav-item"><a class="nav-link px-3 py-4 text-light" href="/product/${item.id}">${item.category_name}</a>`);
})
.catch(error => {
        console.error('Lỗi khi gọi API:', error);
});

