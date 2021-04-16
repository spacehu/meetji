<?php

require_once '../AopCertification.php';

/**
 * 单独测试根证书校验逻辑（AopCertification.php）
 * 证书校验入口方法：isTrusted
 *
 */


$publicCert = "-----BEGIN CERTIFICATE-----
MIIDuzCCAqOgAwIBAgIQIBkJJUfuNECNECzJ3bwjnjANBgkqhkiG9w0BAQsFADCBgjELMAkGA1UE
BhMCQ04xFjAUBgNVBAoMDUFudCBGaW5hbmNpYWwxIDAeBgNVBAsMF0NlcnRpZmljYXRpb24gQXV0
aG9yaXR5MTkwNwYDVQQDDDBBbnQgRmluYW5jaWFsIENlcnRpZmljYXRpb24gQXV0aG9yaXR5IENs
YXNzIDIgUjEwHhcNMTkwOTI1MTMwNDI1WhcNMjEwOTI0MTMwNDI1WjCBmzELMAkGA1UEBhMCQ04x
NjA0BgNVBAoMLeaUr+S7mOWune+8iOadreW3nu+8ieS/oeaBr+aKgOacr+aciemZkOWFrOWPuDEP
MA0GA1UECwwGQWxpcGF5MUMwQQYDVQQDDDrmlK/ku5jlrp0o5Lit5Zu9Kee9kee7nOaKgOacr+ac
iemZkOWFrOWPuC0yMDg4NDMxNjQxMDgzNjgyMIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKC
AQEAumX1EaLM4ddn1Pia4SxTRb62aVYxU8I2mHMqrcpQU6F01mIO/DjY7R4xUWcLi0I2oH/BK/Wh
ckEDCFsGrT7mO+JX8K4sfaWZx1aDGs0m25wOCNjp+DCVBXotXSCurqgGI/9UrY+QydYDnsl4jB65
M3p8VilF93MfS01omEDjUW+1MM4o3FP0khmcKsoHnYGs21btEeh0LK1gnnTDlou6Jwv3Ew36CbCN
Y2cYkuyPAW0j47XqzhWJ7awAx60fwgNBq6ZOEPJnODqH20TAdTLNxPSl4qGxamjBO+RuInBy+Bc2
hFHq3pNv6hTAfktggRKkKzDlDEUwgSLE7d2eL7P6rwIDAQABoxIwEDAOBgNVHQ8BAf8EBAMCA/gw
DQYJKoZIhvcNAQELBQADggEBADVvbb07UgrqK1vbIg62OYvexAtZ4UXB0IE8u5Qd5LflfJn9iC/H
juLSJ3K3oivdrqFe/6aLHSRpNmH2Qt9WdDKvjT5WXqpn6MBxKWqApKgXazIRIAqDmm0G++If7Y8j
xWBCloHe7CAXlKfDW/w6aZ+sz5cnJn2SAFobwJWu8pUjDPZAKTOIrFIM+zXAnc238oiC5Nu1YVH6
D53Df6dZ85/2S/JxnG23tt3KH+p0oauZqnxpatuzm7WdkJo4DhzqlgKwRhBmCHPv/+05a0+uuij3
+ZUZ3DkanbNxW6nwlb+FAwP+BjfamslPn1ATzvAA4aBqxwNGEqAJCAU83HODTz8=
-----END CERTIFICATE-----
-----BEGIN CERTIFICATE-----
MIIE4jCCAsqgAwIBAgIIYsSr5bKAMl8wDQYJKoZIhvcNAQELBQAwejELMAkGA1UEBhMCQ04xFjAU
BgNVBAoMDUFudCBGaW5hbmNpYWwxIDAeBgNVBAsMF0NlcnRpZmljYXRpb24gQXV0aG9yaXR5MTEw
LwYDVQQDDChBbnQgRmluYW5jaWFsIENlcnRpZmljYXRpb24gQXV0aG9yaXR5IFIxMB4XDTE4MDMy
MjE0MzQxNVoXDTM3MTEyNjE0MzQxNVowgYIxCzAJBgNVBAYTAkNOMRYwFAYDVQQKDA1BbnQgRmlu
YW5jaWFsMSAwHgYDVQQLDBdDZXJ0aWZpY2F0aW9uIEF1dGhvcml0eTE5MDcGA1UEAwwwQW50IEZp
bmFuY2lhbCBDZXJ0aWZpY2F0aW9uIEF1dGhvcml0eSBDbGFzcyAyIFIxMIIBIjANBgkqhkiG9w0B
AQEFAAOCAQ8AMIIBCgKCAQEAsLMfYaoRoPRbmDcAfXPCmKf43pWRN5yTXa/KJWO0l+mrgQvs89bA
NEvbDUxlkGwycwtwi5DgBuBgVhLliXu+R9CYgr2dXs8D8Hx/gsggDcyGPLmVrDOnL+dyeauheARZ
fA3du60fwEwwbGcVIpIxPa/4n3IS/ElxQa6DNgqxh8J9Xwh7qMGl0JK9+bALuxf7B541Gr4p0WEN
G8fhgjBV4w4ut9eQLOoa1eddOUSZcy46Z7allwowwgt7b5VFfx/P1iKJ3LzBMgkCK7GZ2kiLrL7R
iqV+h482J7hkJD+ardoc6LnrHO/hIZymDxok+VH9fVeUdQa29IZKrIDVj65THQIDAQABo2MwYTAf
BgNVHSMEGDAWgBRfdLQEwE8HWurlsdsio4dBspzhATAdBgNVHQ4EFgQUSqHkYINtUSAtDPnS8Xoy
oP9p7qEwDwYDVR0TAQH/BAUwAwEB/zAOBgNVHQ8BAf8EBAMCAQYwDQYJKoZIhvcNAQELBQADggIB
AIQ8TzFy4bVIVb8+WhHKCkKNPcJe2EZuIcqvRoi727lZTJOfYy/JzLtckyZYfEI8J0lasZ29wkTt
a1IjSo+a6XdhudU4ONVBrL70U8Kzntplw/6TBNbLFpp7taRALjUgbCOk4EoBMbeCL0GiYYsTS0mw
7xdySzmGQku4GTyqutIGPQwKxSj9iSFw1FCZqr4VP4tyXzMUgc52SzagA6i7AyLedd3tbS6lnR5B
L+W9Kx9hwT8L7WANAxQzv/jGldeuSLN8bsTxlOYlsdjmIGu/C9OWblPYGpjQQIRyvs4Cc/mNhrh+
14EQgwuemIIFDLOgcD+iISoN8CqegelNcJndFw1PDN6LkVoiHz9p7jzsge8RKay/QW6C03KNDpWZ
EUCgCUdfHfo8xKeR+LL1cfn24HKJmZt8L/aeRZwZ1jwePXFRVtiXELvgJuM/tJDIFj2KD337iV64
fWcKQ/ydDVGqfDZAdcU4hQdsrPWENwPTQPfVPq2NNLMyIH9+WKx9Ed6/WzeZmIy5ZWpX1TtTolo6
OJXQFeItMAjHxW/ZSZTok5IS3FuRhExturaInnzjYpx50a6kS34c5+c8hYq7sAtZ/CNLZmBnBCFD
aMQqT8xFZJ5uolUaSeXxg7JFY1QsYp5RKvj4SjFwCGKJ2+hPPe9UyyltxOidNtxjaknOCeBHytOr
-----END CERTIFICATE-----
";
$rootCert = "-----BEGIN CERTIFICATE-----
MIIBszCCAVegAwIBAgIIaeL+wBcKxnswDAYIKoEcz1UBg3UFADAuMQswCQYDVQQG
EwJDTjEOMAwGA1UECgwFTlJDQUMxDzANBgNVBAMMBlJPT1RDQTAeFw0xMjA3MTQw
MzExNTlaFw00MjA3MDcwMzExNTlaMC4xCzAJBgNVBAYTAkNOMQ4wDAYDVQQKDAVO
UkNBQzEPMA0GA1UEAwwGUk9PVENBMFkwEwYHKoZIzj0CAQYIKoEcz1UBgi0DQgAE
MPCca6pmgcchsTf2UnBeL9rtp4nw+itk1Kzrmbnqo05lUwkwlWK+4OIrtFdAqnRT
V7Q9v1htkv42TsIutzd126NdMFswHwYDVR0jBBgwFoAUTDKxl9kzG8SmBcHG5Yti
W/CXdlgwDAYDVR0TBAUwAwEB/zALBgNVHQ8EBAMCAQYwHQYDVR0OBBYEFEwysZfZ
MxvEpgXBxuWLYlvwl3ZYMAwGCCqBHM9VAYN1BQADSAAwRQIgG1bSLeOXp3oB8H7b
53W+CKOPl2PknmWEq/lMhtn25HkCIQDaHDgWxWFtnCrBjH16/W3Ezn7/U/Vjo5xI
pDoiVhsLwg==
-----END CERTIFICATE-----

-----BEGIN CERTIFICATE-----
MIIF0zCCA7ugAwIBAgIIH8+hjWpIDREwDQYJKoZIhvcNAQELBQAwejELMAkGA1UE
BhMCQ04xFjAUBgNVBAoMDUFudCBGaW5hbmNpYWwxIDAeBgNVBAsMF0NlcnRpZmlj
YXRpb24gQXV0aG9yaXR5MTEwLwYDVQQDDChBbnQgRmluYW5jaWFsIENlcnRpZmlj
YXRpb24gQXV0aG9yaXR5IFIxMB4XDTE4MDMyMTEzNDg0MFoXDTM4MDIyODEzNDg0
MFowejELMAkGA1UEBhMCQ04xFjAUBgNVBAoMDUFudCBGaW5hbmNpYWwxIDAeBgNV
BAsMF0NlcnRpZmljYXRpb24gQXV0aG9yaXR5MTEwLwYDVQQDDChBbnQgRmluYW5j
aWFsIENlcnRpZmljYXRpb24gQXV0aG9yaXR5IFIxMIICIjANBgkqhkiG9w0BAQEF
AAOCAg8AMIICCgKCAgEAtytTRcBNuur5h8xuxnlKJetT65cHGemGi8oD+beHFPTk
rUTlFt9Xn7fAVGo6QSsPb9uGLpUFGEdGmbsQ2q9cV4P89qkH04VzIPwT7AywJdt2
xAvMs+MgHFJzOYfL1QkdOOVO7NwKxH8IvlQgFabWomWk2Ei9WfUyxFjVO1LVh0Bp
dRBeWLMkdudx0tl3+21t1apnReFNQ5nfX29xeSxIhesaMHDZFViO/DXDNW2BcTs6
vSWKyJ4YIIIzStumD8K1xMsoaZBMDxg4itjWFaKRgNuPiIn4kjDY3kC66Sl/6yTl
YUz8AybbEsICZzssdZh7jcNb1VRfk79lgAprm/Ktl+mgrU1gaMGP1OE25JCbqli1
Pbw/BpPynyP9+XulE+2mxFwTYhKAwpDIDKuYsFUXuo8t261pCovI1CXFzAQM2w7H
DtA2nOXSW6q0jGDJ5+WauH+K8ZSvA6x4sFo4u0KNCx0ROTBpLif6GTngqo3sj+98
SZiMNLFMQoQkjkdN5Q5g9N6CFZPVZ6QpO0JcIc7S1le/g9z5iBKnifrKxy0TQjtG
PsDwc8ubPnRm/F82RReCoyNyx63indpgFfhN7+KxUIQ9cOwwTvemmor0A+ZQamRe
9LMuiEfEaWUDK+6O0Gl8lO571uI5onYdN1VIgOmwFbe+D8TcuzVjIZ/zvHrAGUcC
AwEAAaNdMFswCwYDVR0PBAQDAgEGMAwGA1UdEwQFMAMBAf8wHQYDVR0OBBYEFF90
tATATwda6uWx2yKjh0GynOEBMB8GA1UdIwQYMBaAFF90tATATwda6uWx2yKjh0Gy
nOEBMA0GCSqGSIb3DQEBCwUAA4ICAQCVYaOtqOLIpsrEikE5lb+UARNSFJg6tpkf
tJ2U8QF/DejemEHx5IClQu6ajxjtu0Aie4/3UnIXop8nH/Q57l+Wyt9T7N2WPiNq
JSlYKYbJpPF8LXbuKYG3BTFTdOVFIeRe2NUyYh/xs6bXGr4WKTXb3qBmzR02FSy3
IODQw5Q6zpXj8prYqFHYsOvGCEc1CwJaSaYwRhTkFedJUxiyhyB5GQwoFfExCVHW
05ZFCAVYFldCJvUzfzrWubN6wX0DD2dwultgmldOn/W/n8at52mpPNvIdbZb2F41
T0YZeoWnCJrYXjq/32oc1cmifIHqySnyMnavi75DxPCdZsCOpSAT4j4lAQRGsfgI
kkLPGQieMfNNkMCKh7qjwdXAVtdqhf0RVtFILH3OyEodlk1HYXqX5iE5wlaKzDop
PKwf2Q3BErq1xChYGGVS+dEvyXc/2nIBlt7uLWKp4XFjqekKbaGaLJdjYP5b2s7N
1dM0MXQ/f8XoXKBkJNzEiM3hfsU6DOREgMc1DIsFKxfuMwX3EkVQM1If8ghb6x5Y
jXayv+NLbidOSzk4vl5QwngO/JYFMkoc6i9LNwEaEtR9PhnrdubxmrtM+RjfBm02
77q3dSWFESFQ4QxYWew4pHE0DpWbWy/iMIKQ6UZ5RLvB8GEcgt8ON7BBJeMc+Dyi
kT9qhqn+lw==
-----END CERTIFICATE-----

-----BEGIN CERTIFICATE-----
MIICiDCCAgygAwIBAgIIQX76UsB/30owDAYIKoZIzj0EAwMFADB6MQswCQYDVQQG
EwJDTjEWMBQGA1UECgwNQW50IEZpbmFuY2lhbDEgMB4GA1UECwwXQ2VydGlmaWNh
dGlvbiBBdXRob3JpdHkxMTAvBgNVBAMMKEFudCBGaW5hbmNpYWwgQ2VydGlmaWNh
dGlvbiBBdXRob3JpdHkgRTEwHhcNMTkwNDI4MTYyMDQ0WhcNNDkwNDIwMTYyMDQ0
WjB6MQswCQYDVQQGEwJDTjEWMBQGA1UECgwNQW50IEZpbmFuY2lhbDEgMB4GA1UE
CwwXQ2VydGlmaWNhdGlvbiBBdXRob3JpdHkxMTAvBgNVBAMMKEFudCBGaW5hbmNp
YWwgQ2VydGlmaWNhdGlvbiBBdXRob3JpdHkgRTEwdjAQBgcqhkjOPQIBBgUrgQQA
IgNiAASCCRa94QI0vR5Up9Yr9HEupz6hSoyjySYqo7v837KnmjveUIUNiuC9pWAU
WP3jwLX3HkzeiNdeg22a0IZPoSUCpasufiLAnfXh6NInLiWBrjLJXDSGaY7vaokt
rpZvAdmjXTBbMAsGA1UdDwQEAwIBBjAMBgNVHRMEBTADAQH/MB0GA1UdDgQWBBRZ
4ZTgDpksHL2qcpkFkxD2zVd16TAfBgNVHSMEGDAWgBRZ4ZTgDpksHL2qcpkFkxD2
zVd16TAMBggqhkjOPQQDAwUAA2gAMGUCMQD4IoqT2hTUn0jt7oXLdMJ8q4vLp6sg
wHfPiOr9gxreb+e6Oidwd2LDnC4OUqCWiF8CMAzwKs4SnDJYcMLf2vpkbuVE4dTH
Rglz+HGcTLWsFs4KxLsq7MuU+vJTBUeDJeDjdA==
-----END CERTIFICATE-----

-----BEGIN CERTIFICATE-----
MIIDxTCCAq2gAwIBAgIUEMdk6dVgOEIS2cCP0Q43P90Ps5YwDQYJKoZIhvcNAQEF
BQAwajELMAkGA1UEBhMCQ04xEzARBgNVBAoMCmlUcnVzQ2hpbmExHDAaBgNVBAsM
E0NoaW5hIFRydXN0IE5ldHdvcmsxKDAmBgNVBAMMH2lUcnVzQ2hpbmEgQ2xhc3Mg
MiBSb290IENBIC0gRzMwHhcNMTMwNDE4MDkzNjU2WhcNMzMwNDE4MDkzNjU2WjBq
MQswCQYDVQQGEwJDTjETMBEGA1UECgwKaVRydXNDaGluYTEcMBoGA1UECwwTQ2hp
bmEgVHJ1c3QgTmV0d29yazEoMCYGA1UEAwwfaVRydXNDaGluYSBDbGFzcyAyIFJv
b3QgQ0EgLSBHMzCCASIwDQYJKoZIhvcNAQEBBQADggEPADCCAQoCggEBAOPPShpV
nJbMqqCw6Bz1kehnoPst9pkr0V9idOwU2oyS47/HjJXk9Rd5a9xfwkPO88trUpz5
4GmmwspDXjVFu9L0eFaRuH3KMha1Ak01citbF7cQLJlS7XI+tpkTGHEY5pt3EsQg
wykfZl/A1jrnSkspMS997r2Gim54cwz+mTMgDRhZsKK/lbOeBPpWtcFizjXYCqhw
WktvQfZBYi6o4sHCshnOswi4yV1p+LuFcQ2ciYdWvULh1eZhLxHbGXyznYHi0dGN
z+I9H8aXxqAQfHVhbdHNzi77hCxFjOy+hHrGsyzjrd2swVQ2iUWP8BfEQqGLqM1g
KgWKYfcTGdbPB1MCAwEAAaNjMGEwHQYDVR0OBBYEFG/oAMxTVe7y0+408CTAK8hA
uTyRMB8GA1UdIwQYMBaAFG/oAMxTVe7y0+408CTAK8hAuTyRMA8GA1UdEwEB/wQF
MAMBAf8wDgYDVR0PAQH/BAQDAgEGMA0GCSqGSIb3DQEBBQUAA4IBAQBLnUTfW7hp
emMbuUGCk7RBswzOT83bDM6824EkUnf+X0iKS95SUNGeeSWK2o/3ALJo5hi7GZr3
U8eLaWAcYizfO99UXMRBPw5PRR+gXGEronGUugLpxsjuynoLQu8GQAeysSXKbN1I
UugDo9u8igJORYA+5ms0s5sCUySqbQ2R5z/GoceyI9LdxIVa1RjVX8pYOj8JFwtn
DJN3ftSFvNMYwRuILKuqUYSHc2GPYiHVflDh5nDymCMOQFcFG3WsEuB+EYQPFgIU
1DHmdZcz7Llx8UOZXX2JupWCYzK1XhJb+r4hK5ncf/w8qGtYlmyJpxk3hr1TfUJX
Yf4Zr0fJsGuv
-----END CERTIFICATE-----";

$testIsTrusted = isTrusted($publicCert, $rootCert);
echo $testIsTrusted;