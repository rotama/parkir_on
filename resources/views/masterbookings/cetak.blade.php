<!DOCTYPE html>
<html>
<head>
<title>Struk Parkir Online</title>
	<style>
		/* --------------------------------------------------------------
		Hartija Css Print Framework
		* Version: 1.0
		-------------------------------------------------------------- */
		body {
			width:100% !important;
			margin:0 !important;
			padding:0 !important;
			line-height: 1.45;
			font-family: Garamond,"Times New Roman", serif;
			color: #000;
			background: none;
			font-size: 11pt; 
		}
		pre {-moz-tab-size: 16;} /* Code for Firefox */
		pre {-o-tab-size: 16;} /* Code for Opera 10.6-12.1 */
		pre {tab-size: 16;}
		/* Headings */
		h1,h2,h3,h4,h5,h6 { 
			page-break-after:avoid; 
		}
		h1{
			font-size:19pt;
		}
		h2{
			font-size:17pt;
		}
		h3{
			font-size:15pt;
		}
		h4,h5,h6{
			font-size:14pt;
		}
		p, h2, h3 { 
			orphans: 3; widows: 3; 
		}
		code { 
			font: 12pt Courier, monospace; 
		}
		blockquote { 
			margin: 1.2em; padding: 1em; font-size: 12pt; 
		}
		hr { 
			background-color: #ccc;
		}
		/* Images */
		img { 
			float: left; margin: 1em 1.5em 1.5em 0; max-width: 100% !important; 
		}
		a img { 
			border: none; 
		}
		/* Links */
		a:link, a:visited { background: transparent; font-weight: 700; text-decoration: underline;col\
			or:#333; 
		}
		a:link[href^="http://"]:after, a[href^="http://"]:visited:after { content: " (" attr(href) ")\
		"; font-size: 90%; }
		abbr[title]:after { content: " (" attr(title) ")"; }
		/* Don't show linked images */
		a[href^="http://"] {color:#000; }
		a[href$=".jpg"]:after, a[href$=".jpeg"]:after, a[href$=".gif"]:after, a[href$=".png"]:after {\
		content: " (" attr(href) ") "; display:none; }
		/* Don't show links that are fragment identifiers, or use the `javascript:` pseudo protocol .\
		. taken from html5boilerplate */
		a[href^="#"]:after, a[href^="javascript:"]:after {content: "";}
		/* Table */
		table { margin: 1px; text-align:left; }
		th { border-bottom: 1px solid #333; font-weight: bold; }
		td { border-bottom: 1px solid #333; }
		th,td { padding: 4px 10px 4px 0; }
		tfoot { font-style: italic; }
		caption { background: #fff; margin-bottom:2em; text-align:left; }
		thead {display: table-header-group;}
		img,tr {page-break-inside: avoid;}
		/* Hide various parts from the site
		#header, #footer, #navigation, #rightSideBar, #leftSideBar
		{display:none;}
		*/
	</style>
</head>
<body>
	<center>
			<strong>Parkir Online</strong><br>
			Bandung, Jl. Kencana no. 11 / No.Telp 08216382636 <br>
			www.parkir-online.com<br>
	</center>
	<hr>
	<table >
		<tr>
			<td>
			<pre>
			No. Transaksi : {{ $masterbookings->kode_trans }}						
			Nama 									: {{ $masterbookings->user->name }}								
			</pre>
			</td>
			<td>
		<pre>
		Tanggal Booking	: {{ date('d-m-Y H:i:s', strtotime($masterbookings->tgl_booking)) }}<br>
		Tanggal Keluar 	: {{ date('d-m-Y H:i:s', strtotime($masterbookings->tgl_keluar)) }}<br>
		</pre>
			</td>
		</tr>
		<tr>
			<td>
				<pre>
					Slot Parkir							: {{ $masterbookings->parkir->slot }}<br>
					Harga 												: Rp.{{ number_format($hrg_parkir,2) }} /hari<br>
					Lama Parkir 						: {{ $lama }} Hari<br>
					@if($masterbookings->perawatan == 'Ya')Biaya Perawatan 		: Rp.{{ number_format($hrg_perawatan,2) }} @endif<br>
					Total Harga							: Rp.{{ number_format($total,2) }}
				</pre>
			</td>
			<td>

			</td>
		</tr>
		<tr>
			<td colspan="2" align="center">
				<strong>
					Silahkan Melakukan Transfer ke No. Rek berikut, Selanjutnya upload bukti transfer tersebut
				</strong>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<pre>
					No. Rek 						Atas Nama 							Nama Bank
				</pre>
			</td>
		</tr>
		<tr>
			<td>
			<pre>
				@foreach($dftr_rek as $data)
	{{ $data->no_rek }} 			{{ $data->atas_nama }} 			{{ $data->nm_bank }}<br>
				@endforeach
			</pre>	
			</td>
			<td>
			
			</td>
		</tr>
	</table>
	<center>
	<h6>
		Terima Kasih
	<h6>
	</center>
</body>
</html>