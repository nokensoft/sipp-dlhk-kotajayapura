(()=>{var e={241:e=>{var a=String,t=function(){return{isColorSupported:!1,reset:a,bold:a,dim:a,italic:a,underline:a,inverse:a,hidden:a,strikethrough:a,black:a,red:a,green:a,yellow:a,blue:a,magenta:a,cyan:a,white:a,gray:a,bgBlack:a,bgRed:a,bgGreen:a,bgYellow:a,bgBlue:a,bgMagenta:a,bgCyan:a,bgWhite:a}};e.exports=t(),e.exports.createColors=t},808:(e,a,t)=>{let r=t(921);e.exports=(r.__esModule?r:{default:r}).default},921:(e,a,t)=>{"use strict";Object.defineProperty(a,"__esModule",{value:!0}),Object.defineProperty(a,"default",{enumerable:!0,get:()=>f});const r=o(t(679));function o(e){return e&&e.__esModule?e:{default:e}}function n({version:e,from:a,to:t}){r.default.warn(`${a}-color-renamed`,[`As of Tailwind CSS ${e}, \`${a}\` has been renamed to \`${t}\`.`,"Update your configuration file to silence this warning."])}const f={inherit:"inherit",current:"currentColor",transparent:"transparent",black:"#000",white:"#fff",slate:{50:"#f8fafc",100:"#f1f5f9",200:"#e2e8f0",300:"#cbd5e1",400:"#94a3b8",500:"#64748b",600:"#475569",700:"#334155",800:"#1e293b",900:"#0f172a",950:"#020617"},gray:{50:"#f9fafb",100:"#f3f4f6",200:"#e5e7eb",300:"#d1d5db",400:"#9ca3af",500:"#6b7280",600:"#4b5563",700:"#374151",800:"#1f2937",900:"#111827",950:"#030712"},zinc:{50:"#fafafa",100:"#f4f4f5",200:"#e4e4e7",300:"#d4d4d8",400:"#a1a1aa",500:"#71717a",600:"#52525b",700:"#3f3f46",800:"#27272a",900:"#18181b",950:"#09090b"},neutral:{50:"#fafafa",100:"#f5f5f5",200:"#e5e5e5",300:"#d4d4d4",400:"#a3a3a3",500:"#737373",600:"#525252",700:"#404040",800:"#262626",900:"#171717",950:"#0a0a0a"},stone:{50:"#fafaf9",100:"#f5f5f4",200:"#e7e5e4",300:"#d6d3d1",400:"#a8a29e",500:"#78716c",600:"#57534e",700:"#44403c",800:"#292524",900:"#1c1917",950:"#0c0a09"},red:{50:"#fef2f2",100:"#fee2e2",200:"#fecaca",300:"#fca5a5",400:"#f87171",500:"#ef4444",600:"#dc2626",700:"#b91c1c",800:"#991b1b",900:"#7f1d1d",950:"#450a0a"},orange:{50:"#fff7ed",100:"#ffedd5",200:"#fed7aa",300:"#fdba74",400:"#fb923c",500:"#f97316",600:"#ea580c",700:"#c2410c",800:"#9a3412",900:"#7c2d12",950:"#431407"},amber:{50:"#fffbeb",100:"#fef3c7",200:"#fde68a",300:"#fcd34d",400:"#fbbf24",500:"#f59e0b",600:"#d97706",700:"#b45309",800:"#92400e",900:"#78350f",950:"#451a03"},yellow:{50:"#fefce8",100:"#fef9c3",200:"#fef08a",300:"#fde047",400:"#facc15",500:"#eab308",600:"#ca8a04",700:"#a16207",800:"#854d0e",900:"#713f12",950:"#422006"},lime:{50:"#f7fee7",100:"#ecfccb",200:"#d9f99d",300:"#bef264",400:"#a3e635",500:"#84cc16",600:"#65a30d",700:"#4d7c0f",800:"#3f6212",900:"#365314",950:"#1a2e05"},green:{50:"#f0fdf4",100:"#dcfce7",200:"#bbf7d0",300:"#86efac",400:"#4ade80",500:"#22c55e",600:"#16a34a",700:"#15803d",800:"#166534",900:"#14532d",950:"#052e16"},emerald:{50:"#ecfdf5",100:"#d1fae5",200:"#a7f3d0",300:"#6ee7b7",400:"#34d399",500:"#10b981",600:"#059669",700:"#047857",800:"#065f46",900:"#064e3b",950:"#022c22"},teal:{50:"#f0fdfa",100:"#ccfbf1",200:"#99f6e4",300:"#5eead4",400:"#2dd4bf",500:"#14b8a6",600:"#0d9488",700:"#0f766e",800:"#115e59",900:"#134e4a",950:"#042f2e"},cyan:{50:"#ecfeff",100:"#cffafe",200:"#a5f3fc",300:"#67e8f9",400:"#22d3ee",500:"#06b6d4",600:"#0891b2",700:"#0e7490",800:"#155e75",900:"#164e63",950:"#083344"},sky:{50:"#f0f9ff",100:"#e0f2fe",200:"#bae6fd",300:"#7dd3fc",400:"#38bdf8",500:"#0ea5e9",600:"#0284c7",700:"#0369a1",800:"#075985",900:"#0c4a6e",950:"#082f49"},blue:{50:"#eff6ff",100:"#dbeafe",200:"#bfdbfe",300:"#93c5fd",400:"#60a5fa",500:"#3b82f6",600:"#2563eb",700:"#1d4ed8",800:"#1e40af",900:"#1e3a8a",950:"#172554"},indigo:{50:"#eef2ff",100:"#e0e7ff",200:"#c7d2fe",300:"#a5b4fc",400:"#818cf8",500:"#6366f1",600:"#4f46e5",700:"#4338ca",800:"#3730a3",900:"#312e81",950:"#1e1b4b"},violet:{50:"#f5f3ff",100:"#ede9fe",200:"#ddd6fe",300:"#c4b5fd",400:"#a78bfa",500:"#8b5cf6",600:"#7c3aed",700:"#6d28d9",800:"#5b21b6",900:"#4c1d95",950:"#2e1065"},purple:{50:"#faf5ff",100:"#f3e8ff",200:"#e9d5ff",300:"#d8b4fe",400:"#c084fc",500:"#a855f7",600:"#9333ea",700:"#7e22ce",800:"#6b21a8",900:"#581c87",950:"#3b0764"},fuchsia:{50:"#fdf4ff",100:"#fae8ff",200:"#f5d0fe",300:"#f0abfc",400:"#e879f9",500:"#d946ef",600:"#c026d3",700:"#a21caf",800:"#86198f",900:"#701a75",950:"#4a044e"},pink:{50:"#fdf2f8",100:"#fce7f3",200:"#fbcfe8",300:"#f9a8d4",400:"#f472b6",500:"#ec4899",600:"#db2777",700:"#be185d",800:"#9d174d",900:"#831843",950:"#500724"},rose:{50:"#fff1f2",100:"#ffe4e6",200:"#fecdd3",300:"#fda4af",400:"#fb7185",500:"#f43f5e",600:"#e11d48",700:"#be123c",800:"#9f1239",900:"#881337",950:"#4c0519"},get lightBlue(){return n({version:"v2.2",from:"lightBlue",to:"sky"}),this.sky},get warmGray(){return n({version:"v3.0",from:"warmGray",to:"stone"}),this.stone},get trueGray(){return n({version:"v3.0",from:"trueGray",to:"neutral"}),this.neutral},get coolGray(){return n({version:"v3.0",from:"coolGray",to:"gray"}),this.gray},get blueGray(){return n({version:"v3.0",from:"blueGray",to:"slate"}),this.slate}}},679:(e,a,t)=>{"use strict";Object.defineProperty(a,"__esModule",{value:!0}),function(e,a){for(var t in a)Object.defineProperty(e,t,{enumerable:!0,get:a[t]})}(a,{dim:()=>s,default:()=>i});const r=o(t(241));function o(e){return e&&e.__esModule?e:{default:e}}let n=new Set;function f(e,a,t){"undefined"!=typeof process&&process.env.JEST_WORKER_ID||t&&n.has(t)||(t&&n.add(t),console.warn(""),a.forEach((a=>console.warn(e,"-",a))))}function s(e){return r.default.dim(e)}const i={info(e,a){f(r.default.bold(r.default.cyan("info")),...Array.isArray(e)?[e]:[a,e])},warn(e,a){f(r.default.bold(r.default.yellow("warn")),...Array.isArray(e)?[e]:[a,e])},risk(e,a){f(r.default.bold(r.default.magenta("risk")),...Array.isArray(e)?[e]:[a,e])}}}},a={};function t(r){var o=a[r];if(void 0!==o)return o.exports;var n=a[r]={exports:{}};return e[r](n,n.exports,t),n.exports}t.n=e=>{var a=e&&e.__esModule?()=>e.default:()=>e;return t.d(a,{a}),a},t.d=(e,a)=>{for(var r in a)t.o(a,r)&&!t.o(e,r)&&Object.defineProperty(e,r,{enumerable:!0,get:a[r]})},t.o=(e,a)=>Object.prototype.hasOwnProperty.call(e,a),(()=>{"use strict";var e=t(808);const a=t.n(e)(),r=a.indigo[600],o=a.blue[500],n=a.emerald[500],f=a.amber[500],s=a.red[500],i=a.purple[500],d=a.cyan[500],c=(a.indigo[100],a.blue[100],a.emerald[100],a.amber[100],a.red[100],a.purple[100],a.cyan[100],[r,o,n,f,s,i,d]),l={type:"line",zoom:{enabled:!1},toolbar:{show:!1}},b={width:3,curve:"smooth",lineCap:"round"},u={chart:{zoom:{enabled:!1},toolbar:{show:!1},type:"bar",height:300},plotOptions:{bar:{horizontal:!1,columnWidth:"30px",borderRadius:2}},colors:[...c],dataLabels:{enabled:!1},stroke:{show:!0,width:6,curve:"smooth",colors:["transparent"]},legend:{itemMargin:{vertical:10},tooltipHoverFormatter:function(e,a){return e+" - "+a.w.globals.series[a.seriesIndex][a.dataPointIndex]}},xaxis:{categories:[]},fill:{opacity:1},tooltip:{y:{formatter:e=>`${e}`}}},p={enabled:!1};class h{static init(){const e={series:[{name:"Desktops",data:[10,41,35,51,49,62,69,91,148],color:o}],chart:{...l,height:350,type:"line",zoom:{enabled:!1}},dataLabels:{enabled:!1},stroke:b,title:{text:"Product Trends by Month",align:"left"},grid:{row:{colors:["#f3f3f3","transparent"],opacity:.5}},xaxis:{categories:["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep"]}};new ApexCharts(document.querySelector("#basic-chart"),e).render();const a={series:[{name:"Session Duration",data:[45,52,38,24,33,26,21,20,6,8,15,10],color:r},{name:"Page Views",data:[35,41,62,42,13,18,29,37,36,51,32,35],color:o},{name:"Total Visits",data:[87,57,74,99,75,38,62,47,82,56,45,47],color:n}],chart:{...l,height:350,type:"line"},dataLabels:p,stroke:{...b,dashArray:[0,8,5]},title:{text:"Page Statistics",align:"left"},legend:{tooltipHoverFormatter:function(e,a){return e+" - <strong>"+a.w.globals.series[a.seriesIndex][a.dataPointIndex]+"</strong>"}},markers:{size:0,hover:{sizeOffset:6}},xaxis:{labels:{trim:!1},categories:["01 Jan","02 Jan","03 Jan","04 Jan","05 Jan","06 Jan","07 Jan","08 Jan","09 Jan","10 Jan","11 Jan","12 Jan"]},tooltip:{y:[{title:{formatter:function(e){return e+" (mins)"}}},{title:{formatter:function(e){return e+" per session"}}},{title:{formatter:function(e){return e}}}]}};new ApexCharts(document.querySelector("#dashline-chart"),a).render();const t={series:[{name:"STOCK ABC",data:[8107.85,8128,8122.9,8165.5,8340.7,8423.7,8423.5,8514.3,8481.85,8487.7,8506.9,8626.2,8668.95,8602.3,8607.55,8512.9,8496.25,8600.65,8881.1,9340.85],color:r}],chart:{...l,type:"area",height:350,zoom:{enabled:!1}},dataLabels:p,title:{text:"Fundamental Analysis of Stocks",align:"left"},subtitle:{text:"Price Movements",align:"left"},labels:["13 Nov 2017","14 Nov 2017","15 Nov 2017","16 Nov 2017","17 Nov 2017","20 Nov 2017","21 Nov 2017","22 Nov 2017","23 Nov 2017","24 Nov 2017","27 Nov 2017","28 Nov 2017","29 Nov 2017","30 Nov 2017","01 Dec 2017","04 Dec 2017","05 Dec 2017","06 Dec 2017","07 Dec 2017","08 Dec 2017"],xaxis:{type:"datetime"},yaxis:{opposite:!0},legend:{horizontalAlign:"left"},stroke:b};new ApexCharts(document.querySelector("#basic-area-chart"),t).render();const s={series:[{name:"series1",data:[31,40,28,51,42,109,100],color:r},{name:"series2",data:[11,32,45,32,34,52,41],color:o}],chart:{...l,height:350,type:"area"},dataLabels:p,stroke:b,xaxis:{type:"datetime",categories:["2018-09-19T00:00:00.000Z","2018-09-19T01:30:00.000Z","2018-09-19T02:30:00.000Z","2018-09-19T03:30:00.000Z","2018-09-19T04:30:00.000Z","2018-09-19T05:30:00.000Z","2018-09-19T06:30:00.000Z"]},tooltip:{x:{format:"dd/MM/yy HH:mm"}}};new ApexCharts(document.querySelector("#spline-area-chart"),s).render();const i={series:[{name:"Net Profit",data:[44,55,57,56,61,58,63,60,66],color:r},{name:"Revenue",data:[76,85,101,98,87,105,91,114,94],color:o},{name:"Free Cash Flow",data:[35,41,36,26,45,48,52,53,41],color:n}],chart:{...l,type:"bar",height:350},plotOptions:u,dataLabels:p,stroke:{show:!0,width:2,colors:["transparent"]},xaxis:{categories:["Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct"]},yaxis:{title:{text:"$ (thousands)"}},fill:{opacity:1},tooltip:{y:{formatter:function(e){return"$ "+e+" thousands"}}}};new ApexCharts(document.querySelector("#basic-column-chart"),i).render();const d={series:[{name:"PRODUCT A",data:[44,55,41,67,22,43],color:r},{name:"PRODUCT B",data:[13,23,20,8,13,27],color:o},{name:"PRODUCT C",data:[11,17,15,15,21,14],color:n},{name:"PRODUCT D",data:[21,7,25,13,22,8],color:f}],chart:{type:"bar",height:350,stacked:!0,toolbar:{show:!0},zoom:{enabled:!0}},responsive:[{breakpoint:480,options:{legend:{position:"bottom",offsetX:-10,offsetY:0}}}],plotOptions:{bar:{horizontal:!1}},xaxis:{type:"category",categories:["01/2011","02/2011","03/2011","04/2011","05/2011","06/2011"]},legend:{position:"right",offsetY:40},fill:{opacity:1}};new ApexCharts(document.querySelector("#stack-column-chart"),d).render();const c={series:[{name:"basic",data:[400,430,448,470,540,580,690,1100,1200,1380],color:r}],chart:{...l,type:"bar",height:350},plotOptions:{bar:{horizontal:!0}},dataLabels:p,xaxis:{categories:["South Korea","Canada","United Kingdom","Netherlands","Italy","France","Japan","United States","China","Germany"]}};new ApexCharts(document.querySelector("#basic-bar-chart"),c).render();const h={series:[{name:"serie1",data:[44,55,41,64,22,43,21],color:r},{name:"serie2",data:[53,32,33,52,13,44,32],color:o}],chart:{...l,type:"bar",height:430},plotOptions:{bar:{horizontal:!0,dataLabels:{position:"top"}}},dataLabels:{enabled:!0,offsetX:-6,style:{fontSize:"12px",colors:["#fff"]}},stroke:{show:!0,width:1,colors:["#fff"]},xaxis:{categories:[2001,2002,2003,2004,2005,2006,2007]}};new ApexCharts(document.querySelector("#grouped-bar-chart"),h).render();const m={series:[44,55,13,43,22],chart:{...l,width:380,type:"pie"},labels:["Team A","Team B","Team C","Team D","Team E"],responsive:[{breakpoint:480,options:{chart:{width:200},legend:{position:"bottom"}}}]};new ApexCharts(document.querySelector("#simple-pie"),m).render();const y={series:[44,55,13,43,22],chart:{...l,width:380,type:"donut"},labels:["Team A","Team B","Team C","Team D","Team E"],responsive:[{breakpoint:480,options:{chart:{width:200},legend:{position:"bottom"}}}]};new ApexCharts(document.querySelector("#simple-donut"),y).render()}}$((()=>{h.init()}))})()})();