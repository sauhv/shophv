var callAPI = (url) => {
    return fetch(url)
        .then(response => response.json())
        .catch(error => {
            console.error('Lỗi khi gọi API:', error);
            throw error;
        });
}
callAPI('js/API/Provinces.json').then(res => {
    var provinces = res.data.data
    provinces.map(provin => document.getElementById('provinces').innerHTML 
    += `<option value='${provin.name_with_type}' data-id='${provin.code}'>${provin.name_with_type}</option>`)

    document.getElementById('provinces').onchange = (e) => {
        var province_code = e.target.selectedOptions[0].getAttribute('data-id')
        document.getElementById('districts').innerHTML = "<option value=''>Chọn quận huyện</option>"
        document.getElementById('wards').innerHTML = `<option>Chọn phường xã</option>`
        setTimeout(() => {
            callAPI('js/API/Districts.json').then(res => {
                var districts = res.data.data
                districts.filter(district => district.parent_code === province_code).forEach(dis => {
                    document.getElementById('districts').innerHTML += `<option value='${dis.name_with_type}' data-id='${dis.code}' >${dis.name_with_type}</option>`
                });
            })


            document.getElementById('districts').onchange = (e) => {
                var district_code = e.target.selectedOptions[0].getAttribute('data-id')
                document.getElementById('wards').innerHTML = `<option>Chọn phường xã</option>`
                setTimeout(() => {
                    callAPI('js/API/wards.json').then(res => {
                        var wards = res.data.data
                        wards.filter(wards => wards.parent_code === district_code).forEach(war => {
                            document.getElementById('wards').innerHTML += `<option value='${war.name_with_type}' >${war.name_with_type}</option>`
                        })
                    })
                }, 500)
            }

        }, 500)
    }
})