## Install Docker Engine on Ubuntu

To get started with Docker Engine on Ubuntu, make sure you [meet the prerequisites](https://docs.docker.com/engine/install/ubuntu/#prerequisites), then [install Docker](https://docs.docker.com/engine/install/ubuntu/#installation-methods).

## Prerequisites

### OS requirements

To install Docker Engine, you need the 64-bit version of one of these Ubuntu versions:

*   Ubuntu Kinetic 22.10
*   Ubuntu Jammy 22.04 (LTS)
*   Ubuntu Focal 20.04 (LTS)
*   Ubuntu Bionic 18.04 (LTS)

Docker Engine is compatible with `x86_64` (or `amd64`), `armhf`, `arm64`, and `s390x` architectures.

### Uninstall old versions

Older versions of Docker went by the names of `docker`, `docker.io`, or `docker-engine`. Uninstall any such older versions before attempting to install a new version:

```plaintext
$ sudo apt-get remove docker docker-engine docker.io containerd runc
```

It’s OK if `apt-get` reports that none of these packages are installed.

Images, containers, volumes, and networks stored in `/var/lib/docker/` aren’t automatically removed when you uninstall Docker. If you want to start with a clean installation, and prefer to clean up any existing data, refer to the [uninstall Docker Engine](https://docs.docker.com/engine/install/ubuntu/#uninstall-docker-engine) section.

## Installation methods

You can install Docker Engine in different ways, depending on your needs:

Docker Engine comes bundled with [Docker Desktop for Linux](https://docs.docker.com/desktop/install/linux-install/). This is the easiest and quickest way to get started.

You can also set up and install Docker Engine from [Docker’s `apt` repository](https://docs.docker.com/engine/install/ubuntu/#install-using-the-repository).

[Install it manually](https://docs.docker.com/engine/install/ubuntu/#install-from-a-package) and manage upgrades manually.

Using a [convenience scripts](https://docs.docker.com/engine/install/ubuntu/#install-using-the-convenience-script). Only recommended for testing and development environments.

### Install using the repository

Before you install Docker Engine for the first time on a new host machine, you need to set up the Docker repository. Afterward, you can install and update Docker from the repository.

#### Set up the repository

Update the `apt` package index and install packages to allow `apt` to use a repository over HTTPS:

```plaintext
$ sudo apt-get update

$ sudo apt-get install \
    ca-certificates \
    curl \
    gnupg \
    lsb-release
```

Add Docker’s official GPG key:

```plaintext
$ sudo mkdir -m 0755 -p /etc/apt/keyrings
$ curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo gpg --dearmor -o /etc/apt/keyrings/docker.gpg
```

Use the following command to set up the repository:

```plaintext
$ echo \
  "deb [arch=$(dpkg --print-architecture) signed-by=/etc/apt/keyrings/docker.gpg] https://download.docker.com/linux/ubuntu \
  $(lsb_release -cs) stable" | sudo tee /etc/apt/sources.list.d/docker.list > /dev/null
```

#### Install Docker Engine

Update the `apt` package index:

```plaintext
$ sudo apt-get update
```

> **Receiving a GPG error when running** `**apt-get update**`**?**
> 
> Your default [umask](https://en.wikipedia.org/wiki/Umask) may be incorrectly configured, preventing detection of the repository public key file. Try granting read permission for the Docker public key file before updating the package index:
> 
> ```plaintext
> $ sudo chmod a+r /etc/apt/keyrings/docker.gpg
> $ sudo apt-get update
> ```

Install Docker Engine, containerd, and Docker Compose.

*   Latest
*   Specific version

Verify that the Docker Engine installation is successful by running the `hello-world` image:

```plaintext
$ sudo docker run hello-world
```

This command downloads a test image and runs it in a container. When the container runs, it prints a confirmation message and exits.


You have now successfully installed and started Docker Engine. The `docker` user group exists but contains no users, which is why you’re required to use `sudo` to run Docker commands. Continue to [Linux post-install](https://docs.docker.com/engine/install/linux-postinstall/) to allow non-privileged users to run Docker commands and for other optional configuration steps.