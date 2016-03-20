
# Installation

1) Import core ```./typo3/cli_dispatch.phpsh extbase monitoring:importcoreversions```
2) Import extensions ```./typo3/cli_dispatch.phpsh extbase monitoring:importextensionversions```
3) Add clients in backend
4) Run clients: ```./typo3/cli_dispatch.phpsh extbase monitoring:importClients```


# Ideas

- [ ] tooltip
- [x] version as integer
- [x] SLA record
- [x] Overview: Clients with connection troubles
- [x] Changelog for updates
- [ ] HowTo section for client installation in master ext
- [x] Save last calls to registry
- [x] Composer mode yes/no
- [x] rss feed of security bulletins

# Misc

- [x] core only older than 4.5.0
- [ ] Mysql is requirement because of transactions
- [ ] extensions only younger than...

# ToDos

- fields missing:
	- client:
	- extension:
	- core:
