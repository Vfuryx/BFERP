import axios from 'axios'
// 下载模板
export const downloadTemplate = function (scheduleType) {
  axios.get('/rest/schedule/template', {
    params: {
      "scheduleType": scheduleType
    },
    responseType: 'arraybuffer'
  }).then((response) => {
    //创建一个blob对象,file的一种
    let blob = new Blob([response.data], { type: 'application/x-xls' })
    let link = document.createElement('a')
    link.href = window.URL.createObjectURL(blob)
    link.download = fileNames[scheduleType] + '_' + response.headers.datestr + '.xls'
    link.click()
  })
}